<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Pet;
use App\Models\Customer;
use App\Imports\PetsImport;
use App\Exports\PetsExport;
use Maatwebsite\Excel\Facades\Excel;

class PetController extends Controller
{
    public function get()
    {
        return Datatables::of(Pet::with(['customer.user'])->get())
            ->addIndexColumn()
            ->addColumn('owner', function ($row) {
                return $row->customer->user->first_name . " " . $row->customer->user->last_name;
            })
            ->addColumn('img', function ($row) {
                $img = '<img src=' . $row->img_path . ' alt = "I am a pic" height="50" width="50">';
                return $img;
            })
            ->addColumn('action', function ($row) {
                $consult = "<a href=" . route('consult', ['id' => $row->id]) . ">Consult Pet</a>";

                $btn = "<a href=" . route('pet.edit', ['id' => $row->id]) . ">Edit</a>";
                $btn = $btn . "<a href=" . route('pet.delete', ['id' => $row->id]) . ">Delete</a>";
                $btn = $btn . auth()->user()['Employee'] ? ""  : $consult;
                $btn = $btn . "<a href=" . route('history', ['id' => $row->id]) . ">Medical History</a>";
                return $btn;
            })
            ->rawColumns(['owner', 'img', 'action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        if ($request->hasfile("img_path")) {
            $file = $request->file("img_path");
            $filename =  $file->getClientOriginalName();
            $destinationPath = public_path() . '/images/pet';
            $file->move($destinationPath, $filename);
        }

        $customer = Customer::with([])->where(['user_id' => auth()->user()['id']])->first();

        Pet::create([
            'customer_id' => $customer['id'],
            'pet_name' => $request->pet_name,
            'age' => (int) $request->age,
            'breed' => $request->breed,
            'sex' => $request->sex,
            'img_path' => '/images/pet/' . $filename,
        ]);
        return redirect('/');
    }

    public function update(Request $request, $id)
    {

        if ($request->hasfile("img_path")) {
            $file = $request->file("img_path");
            $filename =  $file->getClientOriginalName();
            $destinationPath = public_path() . '/images/pet';
            $file->move($destinationPath, $filename);
        }

        $pet = Pet::find($id);
        $pet->pet_name = $request->pet_name;
        $pet->breed = $request->breed;
        $pet->sex = $request->sex;
        $pet->age = (int) $request->age;
        $pet->img_path = '/images/pet/' . $filename;
        $pet->save();
        return redirect('/pet');
    }

    public function destroy($id)
    {
        $pet = Pet::find($id);
        $pet->delete();
        return redirect('/pet');
    }

    public function import()
    {
        Excel::import(new PetsImport, request()->file('file'));
        return back();
    }

    public function export()
    {
        return Excel::download(new PetsExport, 'pets.xlsx');
    }
}

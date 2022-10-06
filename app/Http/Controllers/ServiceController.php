<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Yajra\Datatables\Datatables;

class ServiceController extends Controller
{

    public function get()
    {
        return Datatables::of(Service::with([])->get())
            ->addIndexColumn()
            ->addColumn('img', function ($row) {
                $img = '<img src=' . $row->img_path . ' alt = "I am a pic" height="50" width="50">';;
                return $img;
            })
            ->addColumn('action', function ($row) {
                $btn = "<a href=" . route('service.edit', ['id' => $row->id]) . ">Edit</a>";
                $btn = $btn . "<a href=" . route('service.delete', ['id' => $row->id]) . ">Delete</a>";
                return $btn;
            })
            ->rawColumns(['img', 'action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        if ($request->hasfile("img_path")) {
            $file = $request->file("img_path");
            $filename =  $file->getClientOriginalName();
            $destinationPath = public_path() . '/images/service';
            $file->move($destinationPath, $filename);
        }

        Service::create([
            'service_name' => $request->service_name,
            'price' => (int) $request->price,
            'img_path' => '/images/service/' . $filename,
        ]);
        return redirect('/service');
    }

    public function update(Request $request, $id)
    {

        if ($request->hasfile("img_path")) {
            $file = $request->file("img_path");
            $filename =  $file->getClientOriginalName();
            $destinationPath = public_path() . '/images/service';
            $file->move($destinationPath, $filename);
        }
        $service = Service::find($id);
        $service->service_name = $request->service_name;
        $service->price = (int) $request->price;
        $service->img_path = '/images/service/' . $filename;
        $service->save();
        return redirect('/service');
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect('/service');
    }
}

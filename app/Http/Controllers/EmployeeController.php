<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Employee;
use Yajra\Datatables\Datatables;
use App\Imports\EmployeesImport;
use App\Exports\EmployeesExport;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function get()
    {
        $employees = Employee::with(['user'])->get();
        return Datatables::of($employees)
            ->addIndexColumn()
            ->addColumn('img', function ($row) {
                $img = '<img src="' . $row->user->img_path . '" alt = "I am a pic" height="50" width="50">';
                return $img;
            })
            ->addColumn('action', function ($row) {
                $btn = "<a href=" . route('employee.edit_position', ['id' => $row->id]) . ">Change Position</a>";
                $btn = $btn . "<a href=" . route('employee.delete', ['id' => $row->id]) . ">Delete</a>";
                return $btn;
            })
            ->rawColumns(['img', 'action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            if ($request->hasfile("img_path")) {
                $file = $request->file("img_path");
                $filename =  $file->getClientOriginalName();
                $destinationPath = public_path() . '/images/employees';
                $file->move($destinationPath, $filename);
            }

            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' =>  Hash::make($request->password),
                'role' => "Employee",
                'img_path' => '/images/employees/' . $filename,
            ]);

            Employee::create(['user_id' => $user->id,]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        return redirect('/');
    }

    public function change_position(Request $request, $id)
    {
        $employee = Employee::find($id);
        $employee->position = $request->position;
        $employee->save();
        return redirect('/employee');
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect('/employee');
    }

    public function import()
    {
        Excel::import(new EmployeesImport, request()->file('file'));
        return back();
    }

    public function export()
    {
        return Excel::download(new EmployeesExport, 'employees.xlsx');
    }
}

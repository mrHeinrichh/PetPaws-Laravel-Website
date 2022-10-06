<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;

class AdminController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasfile("img_path")) {
            $file = $request->file("img_path");
            $filename =  $file->getClientOriginalName();
            $destinationPath = public_path() . '/images/admins';
            $file->move($destinationPath, $filename);
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' =>  Hash::make($request->password),
            'role' => "Admin",
            'img_path' => '/images/admins/' . $filename,
        ]);

        Admin::create(['user_id' => $user->id,]);

        try {
            DB::beginTransaction();

            if ($request->hasfile("img_path")) {
                $file = $request->file("img_path");
                $filename =  $file->getClientOriginalName();
                $destinationPath = public_path() . '/images/admins';
                $file->move($destinationPath, $filename);
            }

            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' =>  Hash::make($request->password),
                'role' => "Admin",
                'img_path' => '/images/admins/' . $filename,
            ]);

            Admin::create(['user_id' => $user->id,]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        return redirect('/');
    }
}

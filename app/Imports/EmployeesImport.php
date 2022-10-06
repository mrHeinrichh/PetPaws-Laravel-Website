<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EmployeesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {


        try {
            $customer = User::with([])->where(['role' => "Customer", 'email' => $row[2]])->firstOrFail();
        } catch (ModelNotFoundException $ex) {

            $user = User::create([
                'first_name' => $row[0],
                'last_name' => $row[1],
                'email' => $row[2],
                'password' => Hash::make("asd"),
                'role' => 'Employee',
                'img_path' => '/assets/background-image-customer-employee.png',
            ]);

            return new Employee([
                'user_id' => $user->id,
                'position' => $row[3]
            ]);
        }
    }
}

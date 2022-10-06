<?php

namespace App\Imports;

use App\Models\Customer;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CustomersImport implements ToModel
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
                'role' => 'Customer',
                'img_path' => '/assets/background-image-customer-employee.png',
            ]);

            return new Customer([
                'user_id' => $user->id,
            ]);
        }
    }
}

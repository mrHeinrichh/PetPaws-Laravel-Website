<?php

namespace App\Imports;

use App\Models\Pet;
use App\Models\User;
use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class PetsImport implements ToModel
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
                'password' =>  Hash::make("asd"),
                'role' => "Customer",
                'img_path' => '/assets/background-image-customer-employee.png',
            ]);

            $customer = Customer::create(
                [
                    'user_id' => $user->id
                ],
            );
        }

        return new Pet([
            'customer_id' => $customer->id,
            'pet_name' => $row[3],
            'age' => $row[4],
            'breed' => $row[5],
            'sex' => $row[6],
            'img_path' => '/assets/background-image-customer-employee.png',
        ]);
    }
}

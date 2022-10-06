<?php

namespace App\Exports;

use App\Models\Pet;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class PetsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Pet::select("first_name", "last_name", "email", "pet_name", "age", "breed", "sex")
            ->join('customers', 'customers.id', '=', 'pets.customer_id')
            ->join('users', 'users.id', '=', 'customers.user_id')
            ->get();
    }
}

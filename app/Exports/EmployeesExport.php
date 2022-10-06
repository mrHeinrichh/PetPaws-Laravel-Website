<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmployeesExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::select("first_name", "last_name", "email", "employees.position")
            ->join('employees', 'employees.user_id', '=', 'users.id')
            ->where('role', 'Employee')->get();
    }
}

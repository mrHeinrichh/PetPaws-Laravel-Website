<?php

namespace App\Http\Controllers;

use App\Event\ConsultCreated;
use Illuminate\Http\Request;
use App\Models\History;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use App\Models\Pet;

class HistoryController extends Controller
{
    public function store(Request $request, $id)
    {

        try {
            DB::beginTransaction();

            $employee = Employee::with([])->where(['user_id' => auth()->user()['id']])->first();

            History::create([
                'pet_id' => $id,
                'employee_id' => $employee->id,
                'illness' => $request->illness,
                'comment' => $request->comment,
                'fee' => (int)  $request->fee,
            ]);

            $pet = Pet::with(['customer.user'])->where(['id' => $id])->first();
            event(new ConsultCreated($pet->customer->user->email, $request->illness, $request->comment, $request->fee));

            DB::commit();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
        }

        return redirect('/pet');
    }
}

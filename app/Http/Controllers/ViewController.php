<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Pet;
use App\Models\Employee;
use App\Models\Comment;
use App\Models\History;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Support\Facades\Session;

class ViewController extends Controller
{
    public function service()
    {
        return view('service.index');
    }

    public function addService()
    {
        return view('service.add');
    }

    public function editService($id)
    {
        $data = Service::with([])->where('id', $id)->first();
        return view('service.edit', ['data' => $data]);
    }

    public function signin()
    {
        return view('user.signin');
    }

    public function signup()
    {
        return view('user.signup');
    }

    public function customer()
    {
        return view('customer.index');
    }

    public function profile()
    {
        return view('user.profile', ['user' => auth()->user()->toArray()]);
    }

    public function consult($id)
    {
        return view('consult.index', ['id' => $id]);
    }

    public function history()
    {
        return view('consult.history');
    }

    public function pet()
    {
        return view('pet.index');
    }

    public function addPet()
    {
        return view('pet.add');
    }

    public function editPet($id)
    {
        $data = Pet::with([])->where('id', $id)->first();
        return view('pet.edit', ['data' => $data]);
    }

    public function employee()
    {
        return view('employee.index');
    }

    public function addEmployee()
    {
        return view('employee.add');
    }

    public function edit_position($id)
    {
        $data = Employee::with(['user'])->where('id', $id)->first();
        return view('employee.edit_position', ['data' => $data]);
    }

    public function comment($id)
    {
        $data = Comment::with([])->where('service_id', $id)->get();
        return view('comment.index', ['data' => $data]);
    }

    public function comment_add($id)
    {
        return view('comment.add', ['id' => $id]);
    }

    public function pet_history($id)
    {
        $data = History::with(['pet.customer.user', 'employee.user'])->where('pet_id', $id)->get()->toArray();
        $pet = $data[0]['pet']['pet_name'];
        return view('consult.history', ['data' => $data, 'pet' =>  $pet]);
    }

    public function pet_illness()
    {
        return view('chart.pet_illness');
    }

    public function transaction()
    {
        $services = Service::with([])->get()->toArray();
        return view('transaction.index', ['services' => $services]);
    }

    public function transaction_pet($service)
    {
        $customer = Customer::with([])->where(['user_id' => auth()->user()['id']])->first();
        $pets = Pet::with([])->where(['customer_id' => $customer['id']])->get()->toArray();
        return view('transaction.pet', ['service' => $service, 'pets' => $pets]);
    }

    public function checkout()
    {
        return view('transaction.checkout', ['items' => Session::get('cart')]);
    }

    public function transactions()
    {

        return view('transactions.index');
    }

    public function admin_add()
    {
        return view('admin.add');
    }

    public function transaction_history($id)
    {
        $transactions = Transaction::with(['customer'])->where(['customer.id' => $id])->get()->toArray();
        return view('transaction_history',);
    }

    public function services()
    {
        $services = Service::with([])->get()->toArray();
        return view('services', ['services' => $services]);
    }
}

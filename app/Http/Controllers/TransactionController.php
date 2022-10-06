<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use App\Models\TransactionLine;
use App\Models\Customer;
use Yajra\Datatables\Datatables;

class TransactionController extends Controller
{

    public function get()
    {
        return Datatables::of(Transaction::with(['customer.user', 'transaction_lines.service', 'transaction_lines.pet'])->get())
            ->addIndexColumn()
            ->addColumn('total', function ($row) {
                $price = 0;
                foreach ($row->transaction_lines as $transaction_line) $price += $transaction_line->service->price;
                return $price;
            })
            ->addColumn('approved', function ($row) {
                return $row->approved ? "Approved" : "Not Approved";
            })
            ->addColumn('action', function ($row) {
                return "<a href=" . route('transaction.approve', ['id' => $row->id]) . ">Approve</a>";
            })
            ->rawColumns(['total', 'approved', 'action'])
            ->make(true);
    }

    public function transaction_add($service, $pet)
    {
        $temp_service = Service::select("service_name", "price")->where('id', $service)->first();
        if (Session::get('cart') == null) Session::put('cart', []);
        Session::push('cart', ['service' => $service, 'service_name' => $temp_service['service_name'], 'price' => $temp_service['price'], 'pet' => $pet]);
        Session::save();
        return redirect('/transaction');
    }

    public function transaction_approve($id)
    {
        $transaction = Transaction::find($id);
        $transaction->approved = true;
        $transaction->save();
        return redirect('/transactions');
    }

    public function transaction_delete($id)
    {
        $cart = Session::get('cart');
        unset($cart[(int)$id]);
        Session::put('cart', $cart);
        Session::save();
        return redirect('/checkout');
    }

    public function store()
    {

        try {
            DB::beginTransaction();
            $customer = Customer::select("id")->where(['user_id' => auth()->user()['id']])->first();

            $transaction = Transaction::create([
                'customer_id' => $customer['id'],
                'approved' => false
            ]);

            $cart = Session::get('cart');

            foreach ($cart as $item) {
                TransactionLine::create([
                    'transaction_id' =>  $transaction->id,
                    'service_id' => $item['service'],
                    'pet_id' => $item['pet'],
                ]);
            }
            $cart = Session::put('cart', []);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

        return redirect('/');
    }
}

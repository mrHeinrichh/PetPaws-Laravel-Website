<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public $table = 'transactions';

    protected $fillable = [
        'customer_id',
    ];

    protected $attributes = [
        'approved' => false
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function transaction_lines()
    {
        return $this->hasMany(TransactionLine::class);
    }
}

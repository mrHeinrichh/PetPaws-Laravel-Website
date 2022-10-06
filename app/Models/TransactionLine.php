<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionLine extends Model
{
    use HasFactory;

    public $table = 'transaction_lines';

    protected $fillable = [
        'transaction_id',
        'service_id',
        'pet_id',
    ];

    protected $attributes = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}

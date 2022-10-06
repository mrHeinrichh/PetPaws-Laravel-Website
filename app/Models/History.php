<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    public $table = 'histories';

    protected $fillable = [
        'pet_id',
        'illness',
        'fee',
        'employee_id',
        'comment'
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

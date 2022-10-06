<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;


    public $table = 'employees';

    protected $fillable = [
        'user_id',
        'position',
    ];

    protected $attributes = [
        'position' => 'Assistant',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public $table = 'services';

    protected $fillable = [
        'service_name',
        'price',
        'img_path',
    ];

    protected $attributes = [
        'img_path' => 'asd.jpg',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function transaction_line()
    {
        return $this->hasOne(TransactionLine::class);
    }
}

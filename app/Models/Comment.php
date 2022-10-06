<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public $table = 'comments';

    protected $fillable = [
        'name',
        'email',
        'content',
        'service_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

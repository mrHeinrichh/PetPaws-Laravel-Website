<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'role',
        'email',
        'password',
        'img_path',
        'active'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $attributes = [
        'role' => 'Customer',
        'img_path' => 'asd.jpg',
        'active' => true
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
}

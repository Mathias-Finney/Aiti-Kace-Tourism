<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    public $fillable = [
        'username',
        'email',
        'password',
        'address1',
        'address2',
        'nationality',
        'city',
        'phone',
        'mobile',
        'profile_image'
    ]; 

    public function isAdmin(){
        return $this->role =='admin';
    }
}

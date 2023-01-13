<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserSeller;


class User extends Model implements Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'FirstName',
        'LastName',
        'email',
        'password',
    ];
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function userSellers()
    {
        return $this->hasMany(UserSeller::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}

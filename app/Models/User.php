<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserSeller;


class User extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'FirstName',
        'LastName',
        'email',
        'password',
    ];
    public function userSeller()
    {
        return $this->hasOne(UserSeller::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $casts = [
        'name' => 'array',
    ];

    public function userSeller()
    {
        return $this->belongsTo(UserSeller::class);
    }
}

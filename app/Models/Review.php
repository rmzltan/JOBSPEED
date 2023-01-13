<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $fillable = [
        'service_id',
        'user_seller_id',
        'user_id',
        'rating',
        'message',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function user_seller()
    {
        return $this->belongsTo(UserSeller::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

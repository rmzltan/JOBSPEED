<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'service';

    protected $fillable =[
        'title',
        'category',
        'minPricing',
        'maxPricing',
        'description',
        'service_image'
    ];
    public function userSeller()
    {
        return $this->belongsTo(UserSeller::class);
    }

    
}

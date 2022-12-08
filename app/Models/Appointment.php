<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'appointments';

    protected $fillable =[
        'FirstName',
        'LastName',
        'date',
        'time',
        'email',
        'contact',
        'city',
        'street',
        'message'
    ];
    public function service()
    {
        return $this->belongsTo(Service::class);
        
    }
}

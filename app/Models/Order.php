<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'user_id',
        'status',
        'price',
        'info',
        'api_id',
        'phone_code',

    ];
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
}

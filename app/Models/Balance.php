<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $fillable=['user_id',
        'creditor',
        'debtor',
        'total',
        'notes'
        ];

    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);

    }
}

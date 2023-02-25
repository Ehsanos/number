<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Setting extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $fillable = [
        'profit_rate',
        'api_key',
        'phone_number',
        'facebook',
        'email',
        'address',
        'name',
        'logo'
    ];
    protected $guarded=[];



    use HasFactory;

    public function getImgAttribute()
    {
        if ($this->hasMedia('settings')) {
            return $this->getFirstMediaUrl('settings');
        }

    }

}

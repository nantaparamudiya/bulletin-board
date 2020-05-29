<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];

    public static $path = 'app/public/images';
    public static $dimensions = ['245', '300', '500'];

    public function bulletin()
    {
        return $this->belongsTo('App\Models\Bulletin');
    }
}

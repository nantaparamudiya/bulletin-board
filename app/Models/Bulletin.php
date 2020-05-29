<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bulletin extends Model
{
    // use SoftDeletes;

    protected $guarded = [];

    const IMAGE_PATH = 'bulletin/images';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function image()
    {
        return $this->hasOne('App\Models\Image');
    }
}

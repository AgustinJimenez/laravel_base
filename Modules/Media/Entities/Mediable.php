<?php

namespace Modules\Media\Entities;

use Illuminate\Database\Eloquent\Model;

class Mediable extends Model
{
    protected $fillable = 
    [
        'media_id',
        'mediable_type',
        'mediable_id',
        'tag',
        'order'
    ];
}

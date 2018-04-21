<?php

namespace Modules\Media\Entities;

use Illuminate\Database\Eloquent\Model;

class Imageable extends Model
{
    protected $fillable = [];
    protected $table = "media__imageable";
}

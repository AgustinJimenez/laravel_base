<?php namespace Modules\Media\Entities;

use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Media as MediaBase;
class Media extends MediaBase
{
    protected $fillable = 
    [
        'disk',
        'directory',
        'filename',
        'extension',
        'mime_type',
        'aggregate_type',
        'size'
    ];

}

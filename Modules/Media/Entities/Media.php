<?php namespace Modules\Media\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media as MediaParent;

class Media extends MediaParent
{
    protected $fillable = 
    [
        'model',
        'collection_name',
        'name',
        'file_name',
        'mime_type',
        'disk',
        'size',
        'manipulations',
        'custom_properties',
        'responsive_images',
        'order_column'
    ];

}

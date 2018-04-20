<?php namespace Modules\Media\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media as MediaBase;

class Media extends MediaBase implements HasMedia
{
    use HasMediaTrait;

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

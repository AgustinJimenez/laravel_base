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

    public function getIsImageAttribute()
    {
        return in_array($this->extension, ['jpg', 'png', 'jpeg', 'gif']);
    }

    public function getAbsolutePathAttribute()
    {
        return config( "filesystems" )['disks'][ $this->disk ]['root'];
    }

    public function getFullAbsolutePathAttribute()
    {
        return "{$this->absolute_path}/{$this->filename}.{$this->extension}";
    }

    public function getPublicPathAttribute()
    {
        return str_replace( public_path(), "",  $this->absolute_path);
    }

    public function getFullPublicPathAttribute()
    {
        return "{$this->public_path}/{$this->filename}.{$this->extension}";
    }

    public function get_thumbnail_name($type = 'smallthumb'/*mediumthumb*/)
    {
        return "{$this->filename}_{$type}.{$this->extension}";
    }

    public function get_full_thumbnail_path($type = 'smallthumb'/*mediumthumb*/)
    {
        return "{$this->absolute_path}/{$this->filename}_{$type}.{$this->extension}";
    }

}

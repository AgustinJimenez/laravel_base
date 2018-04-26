<?php namespace Modules\Media\Repositories;

class MediaRepository
{
    public $media;
    public $media_uploader;
    public $filesystems;

    public function __construct( \Media $media, \MediaUploader $media_uploader)
    {
        $this->media = $media;
        $this->media_uploader = $media_uploader;
        $this->filesystems = config('filesystems');
    }

    public function get_disk()
    {
        return $this->filesystems['disks']['media'];
    }

    public function media_url($value = "")
    {
        return $this->get_disk()['url'] . "/" . $value;
    }

    public function create_medium_small_thumbnails()
    {
        if( $this->media->is_image )
            $this->create_thumbnail()->create_thumbnail(180, 100, 'mediumthumb');
    }

    public function upload(&$file)
    {
        $this->media = \MediaUploader::fromSource( $file )->upload();
        return $this;
    }

    public function create_thumbnail($w = 50, $h = 50, $sufix = 'smallthumb')
    {
        \Image::make( $this->media->full_absolute_path )
        ->resize($w, $h, function ($constraint) 
        {
		    $constraint->aspectRatio();
        })
        ->save( $this->media->get_full_thumbnail_path($sufix), 60 );
        return $this;
    }

}
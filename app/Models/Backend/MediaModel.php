<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class MediaModel extends Model implements HasMedia
{

    use HasMediaTrait;

    protected $table = 'media';

    public function addMedia($file)
    {
        
    }

    public function clearMediaCollection(string $collectionName = 'default')
    {
        
    }

    public function copyMedia($file)
    {
        
    }

    public function getMedia(string $collectionName = 'default',
            $filters = array())
    {
        
    }

    public function loadMedia(string $collectionName)
    {
        
    }

    public function media()
    {
        
    }

    public function shouldDeletePreservingMedia()
    {
        
    }

//
}

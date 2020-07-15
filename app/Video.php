<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Translatable\HasTranslations;

class Video extends Model implements HasMedia
{
    use HasMediaTrait ,HasTranslations;
    public $translatable = ['title'];
    protected $fillable = [
        'title','url','thumbnail'
    ];


    public function registerMediaCollections(Media $media = null)
    {
        $this->addMediaCollection('videos')
            ->acceptsMimeTypes(['video/mp4']);

        $this->addMediaConversion('videos_thumb')
            ->width(368)
            ->height(232)
            ->performOnCollections('videos');
    }

}

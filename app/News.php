<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Translatable\HasTranslations;

class News extends Model implements HasMedia
{
    use HasMediaTrait ,HasTranslations;
    public $translatable = ['title','content'];
    protected $fillable = [
        'name','content'
    ];

    public function registerMediaCollections()
    {
        $this->addMediaCollection('news_images')
            ->singleFile();
    }
}

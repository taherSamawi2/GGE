<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Translatable\HasTranslations;

class Book extends Model implements HasMedia
{
    use HasMediaTrait ,HasTranslations;
    public $translatable = ['name'];
    protected $fillable = [
        'name'
    ];

    public function registerMediaCollections()
    {
        $this->addMediaCollection('books')
            ->singleFile();
        $this->addMediaCollection('books_images')
            ->singleFile();
    }

}

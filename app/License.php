<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class License extends Model
{
    use HasTranslations;
    public $translatable = ['title','description'];
    protected $fillable = ['title','description'];
}

<?php

namespace App\Models;

use App\Traits\EscapeUniCodeJson;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Sluggable\SlugOptions;
use App\Traits\HasTranslatableSlug;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Model as DB_Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Model extends DB_Model implements HasMedia
{
    use HasFactory, HasTranslations, HasTranslatableSlug, EscapeUniCodeJson,InteractsWithMedia;
    protected $fillable = ['name', 'date_model', 'status', 'brand_id', 'slug'];
    public $translatable = ['name', 'slug'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}

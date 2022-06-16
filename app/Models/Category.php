<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;
use App\Traits\EscapeUniCodeJson;
use Spatie\Sluggable\SlugOptions;
use App\Traits\HasTranslatableSlug;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory,NodeTrait, HasTranslations, HasTranslatableSlug,EscapeUniCodeJson;

    protected $fillable = ['name', 'status', 'slug','parent_id'];
    public $translatable = ['name', 'slug'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}

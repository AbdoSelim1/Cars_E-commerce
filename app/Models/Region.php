<?php

namespace App\Models;

use App\Traits\EscapeUniCodeJson;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory,HasTranslations, EscapeUniCodeJson;
    protected $fillable = ['name', 'status',"latitude","longitude","radius","notes","city_id"];
    public $translatable = ['name'];

}

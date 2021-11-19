<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    /**
     * allowing mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    /**
     * Get the full shortened URL.
     *
     * we can use this attribute with full_shortened_url accessor
     * @return string
     */
    public function getFullShortenedUrlAttribute()
    {
        return config('app.shorten_url')."/"."{$this->slug}";
    }    
    
}

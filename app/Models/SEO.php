<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SEO extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'meta_keywords',
        'meta_description',
        'social_title',
        'social_description'
    ];

    protected $casts = [
        'meta_keywords' => 'array',
    ];
}

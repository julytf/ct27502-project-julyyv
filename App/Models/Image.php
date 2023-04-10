<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model 
{
    protected $table = 'images';
    protected $primaryKey = 'id';
    protected $fillable = [
        'file',
        'index_image',
        'chapter_id'
    ];
    public $timestamps = false;
}
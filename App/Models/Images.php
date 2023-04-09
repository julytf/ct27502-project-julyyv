<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model 
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
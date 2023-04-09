<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model 
{
    protected $table = 'chapter';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'index_chapter',
        'comic_id'
    ];
    public $timestamps = false;
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comic_Genre extends Model 
{
    protected $table = 'comic_genre';
    protected $primaryKey = [
        'comic_id',
        'genre_id'
    ];
    public $incrementing = false;
    public $timestamps = false;
}
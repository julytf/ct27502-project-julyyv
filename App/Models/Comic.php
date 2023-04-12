<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Chapters;

use App\Models\Genres;

class Comic extends Model
{
    protected $table = 'comics';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'cover_image',
        'status',
        'others_name',
        'author'
    ];
    public $timestamps = false;
    public function chapters(){
        return $this->hasMany(Chapters::class,'comic_id');
    }
    public function genres(){
        return $this->belongsToMany(Genres::class,'comic_genre','comic_id','genre_id');
    }
}

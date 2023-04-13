<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Chapter;

use App\Models\Genre;

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
        return $this->hasMany(Chapter::class,'comic_id');
    }
    public function genres(){
        return $this->belongsToMany(Genre::class,'comic_genre','comic_id','genre_id');
    }
    public function delete_comic(){
        $comic = $this;
        if($comic->cover_image){
            unlink($comic->cover_image);
        }
        $comic->delete();
    }
}

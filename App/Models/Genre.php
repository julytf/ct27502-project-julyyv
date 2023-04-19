<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comic;

class Genre extends Model 
{
    protected $table = 'genres';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description'
    ];
    public $timestamps = false;
    public function comics(){
        return $this->belongsToMany(Comic::class,'comic_genre','genre_id','comic_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comics;

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
        return $this->belongsToMany(Comics::class,'comic_genre','comic_id','genre_id');
    }
}
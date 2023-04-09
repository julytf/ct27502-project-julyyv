<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Images;

class Chapters extends Model 
{
    protected $table = 'chapters';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'index_chapter',
        'comic_id'
    ];
    public $timestamps = false;
    
    public function images(){
        return $this->hasMany(Images::class,'chapter_id');
    }
}
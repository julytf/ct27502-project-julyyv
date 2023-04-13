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
    public function delete_image(){
        $image = $this;
        if($image->file){
            unlink("img/" . $image->file);
        }
        $image->delete();
    }
}
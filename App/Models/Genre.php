<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model 
{
    protected $table = 'genre';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description'
    ];
    public $timestamps = false;
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model 
{
    protected $table = 'comics';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'image',
        'cover_image',
        'status',
        'others_name',
        'country',
        'release_date',
    ];
    public $timestamps = false;
}
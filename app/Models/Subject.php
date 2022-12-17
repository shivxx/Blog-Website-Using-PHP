<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table='subjects';

    protected $fillable=[
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_keyword',
        'navbar_status',
        'status',
        'created_by'
    ];
}

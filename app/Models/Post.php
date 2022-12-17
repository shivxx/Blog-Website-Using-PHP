<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'subject_id',
        'name',
        'slug',
        'description',
        'yt_iframe',
        'meta_title',
        'meta_keyword',
        // 'navbar_status',
        'status',
        'created_by'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'created_by','id');
        return $this->belongsTo(User::class,'user','id');
    }
}

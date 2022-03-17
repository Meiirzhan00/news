<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function author(){

        return $this->belongsTo(Author::class,'author_id','id');
    }

    public function rubrics(){

        return $this->belongsToMany(Rubric::class,'news_rubrics','news_id','rubric_id');
    }
}

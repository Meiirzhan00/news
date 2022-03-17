<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubric extends Model
{
    use HasFactory;

    public function news(){
        return $this->belongsToMany(News::class,'news_rubrics','rubric_id','news_id');
    }
}

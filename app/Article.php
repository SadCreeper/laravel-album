<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //可写字段
    protected $fillable = ['title', 'content'];
}

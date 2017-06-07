<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends BaseModel
{
    protected $table = 'post';

    protected $primaryKey = 'id';

    protected $fillable = ['title', 'content', 'author', 'category'];
}

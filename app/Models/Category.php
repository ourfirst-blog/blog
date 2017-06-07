<?php
namespace App\Models;

class Category extends BaseModel
{
    protected $table = 'category';

    protected $fillable = 'title';

    protected $primaryKey = 'id';
}

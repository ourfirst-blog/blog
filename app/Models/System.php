<?php
namespace App\Models;

class System extends BaseModel
{
    protected $table = 'system';

    protected $fillable = ['id', 'key', 'value'];//开启白名单字段
}

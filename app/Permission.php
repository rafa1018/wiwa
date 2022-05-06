<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Permission extends Model
{
    
    protected $fillable = [
        'key', 'table_name',
    ];

 


 public static function findByidKey($key){
        return static::where('key', $key)->select('id')->value('id');
    }


}

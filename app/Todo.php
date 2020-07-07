<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
 protected $fillable = ['title','completed' , 'user_id','description'];
 // protocted $guarded = [];//do not need write any field then make sure you provide correct request form data when you are submiiting form using mass exception,otherwise gives error.

 // public function getRouteKeyName()
 // {
 // 	return 'title';
 // }
}

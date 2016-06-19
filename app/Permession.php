<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permession extends Model
{
    protected $fillable = ['route_name','man_name','sort_id','item_id'];
}

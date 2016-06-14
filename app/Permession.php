<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permession extends Model
{
    protected $fillable = ['user_id','list_arr'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolePermession extends Model
{
    protected $table = 'roles_permessions';
    protected $fillable = ['roles_id','permession_id'];
}

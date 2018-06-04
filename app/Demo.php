<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
    protected $table = 'demo';
    protected $fillable = ['name', 'age', 'description'];
}

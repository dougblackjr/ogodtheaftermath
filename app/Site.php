<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Site extends Model
{
    use SoftDeletes;

    protected $table = 'sites';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'url', 'up'
    ];
}
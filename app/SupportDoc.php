<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportDoc extends Model
{
    protected $fillable = ['app_id','content_id', 'original_filename', 'new_filename'];
}

<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class teamcategoryModel extends Model
{
    protected $table = 'cl_teamcategory'; 
    protected $fillable = ['title', 'brief'];
}

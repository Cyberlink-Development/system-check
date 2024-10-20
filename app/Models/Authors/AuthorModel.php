<?php

namespace App\Models\Authors;

use Illuminate\Database\Eloquent\Model;

class AuthorModel extends Model
{
    protected $table = 'cl_authors';
    protected $fillable = [ 
    	'name','email','phone','description'
    ];
}

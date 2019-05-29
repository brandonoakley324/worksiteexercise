<?php

namespace App;

use Eloquent; 

use Illuminate\Database\Eloquent\Model;



class Inquiry extends Model
{
    protected $table = 'inquiries';
    protected $fillable = [ 'name', 'email', 'phone', 'message'];
}

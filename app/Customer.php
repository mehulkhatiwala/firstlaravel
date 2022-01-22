<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFacotry;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    // use HasFacotry;
    protected $table = 'customer';
    protected $primaryKey = 'id';
    // protected $visible = ['name'];
    protected $hidden = ['password'];
}

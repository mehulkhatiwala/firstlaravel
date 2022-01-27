<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerSoftDelete extends Model
{
    use SoftDeletes;
    protected $table = 'customer';
    protected $primaryKey = 'id';
    // protected $visible = ['name'];
    protected $hidden = ['password'];


}

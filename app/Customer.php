<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFacotry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    //
    // use HasFacotry;
    // use SoftDeletes;
    protected $table = 'customer';
    protected $primaryKey = 'id';
    // protected $visible = ['name'];
    protected $hidden = ['password'];


    // Mutator in laravel: transforms an Eloquent attribute value when it is set 
    //(set{Attribute}Attribute method as "Studly" case database table's attribute (column)
    // e.g. name of column is: "user_id", setUserIdAttribute())
    // Following mutator set name attribute in all words capital letters format
    public function setNameAttribute($value){
        $this->attributes['name'] = ucwords(strtolower($value));
    }

    // Accessor in laravel: tranforms an Eloquent attribute value when it is accessed
    //get{Attribute}Attribute method as "Studly" case database table's attribute (column)
    public function getDobAttribute($value){
        return date('jS F, Y',strtotime($value));
    }
}

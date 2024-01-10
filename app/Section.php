<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'section';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
 
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    //protected $fillable = ['name', 'arabic_name', 'verified', 'comments', 'arabic_comments', 'image'];

    
}

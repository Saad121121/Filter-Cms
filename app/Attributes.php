<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'attributes';

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
    protected $fillable = ['code', 'name'];

    public function attributesvalue()
    {
        return $this->hasMany('App\AttributeValue', 'id' , 'attribute_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'attributes_values';

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
    protected $fillable = ['attribute_id', 'value'];

    public function attributes()
    {
        return $this->belongsTo('App\Attributes', 'attribute_id', 'id');
    }
    
}

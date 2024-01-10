<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imagetable extends Model
{
   protected $table = 'imagetable';
   public $primaryKey = 'id';
    protected $fillable = [
        'img_path', 'table_name', 'ref_id','type','is_active_img','additional_attributes',
        'img_href',
    ];
}

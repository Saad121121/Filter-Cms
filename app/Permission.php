<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'label'];

    /**
     * A permission can be applied to roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * A permission list that can be used for static menu.
     */

    public static function permissionList($menu)
    {
      $permissionsList = Permission::where('name','LIKE','%'.str_slug($menu))->get();
      $permissions['add'] = $permissionsList->where('name','=','add-'.str_slug($menu))->pluck('id')->first();
      $permissions['edit'] = $permissionsList->where('name','=','edit-'.str_slug($menu))->pluck('id')->first();
      $permissions['view'] = $permissionsList->where('name','=','view-'.str_slug($menu))->pluck('id')->first();
      $permissions['delete'] = $permissionsList->where('name','=','delete-'.str_slug($menu))->pluck('id')->first();
     return  $permissions;
    }
}

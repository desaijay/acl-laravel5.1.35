<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	public function permissions(){
		return $this->belongsToMany(Permission::class);
	}

	public function givePermissionTo(Permission $permission){
		return $this->permissions()->attach($permission);
	}

	public function revokeTo(Permission $permission){
		return $this->permissions()->detach($permission);
	}

	public function users(){
		return $this->belongsToMany(User::class);
	}


   
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use App\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $roles = Role::all();
        $perm = Permission::all();
        $users  = User::all();
        
        return view("welcome", compact("roles", "perm", "users"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function permissions(Request $request){
       $role_id = $request->role;
$permission_ids = $request->p; // This comes back as an array.
if(isset($permission_ids) && isset($role_id)){
    $role_object = Role::where('id', $role_id)->firstOrFail();
    foreach ($permission_ids as $permission_id) {
        // loop through each permission id
        // find the corresponding permission object in the database
        $permission_object = Permission::where('id', $permission_id)->firstOrFail();

        // assign the object to the role
        $role_object->givePermissionTo($permission_object);
    }
    $role_object->save();
}
return Redirect::back();
}

public function revoke(Request $request, $id){
         
$permission_ids = $request->u; // This comes back as an array.

    $role_object = Role::find($id);
        // loop through each permission id
        // find the corresponding permission object in the database

       foreach ($permission_ids as $permission_id) {
        // loop through each permission id
        // find the corresponding permission object in the database
        $permission_object = Permission::where('id', $permission_id)->firstOrFail();

        // assign the object to the role
        $role_object->revokeTo($permission_object);
    }
    //$role_object->delete();

return Redirect::back(); 
}

public function revokeuserrole(Request $request, $id){
    $role = $request->ro; //get roles in array

    $user_object = User::find($id); //find the id
    //find the id
    foreach ($role as $r) {
        $role_object = Role::where("id", $r)->firstOrFail();

        $user_object->revokeRole($role_object);
    }

    return Redirect::back();
}

public function assignroletouser(Request $request){

    $role_ids = $request->rw; //this will assign an array or the single id
//dd($role_ids);
    $user_id = $request->user; //select 1 user 

    if(isset($role_ids) && isset($user_id)){
        $user_obj = User::where("id", $user_id)->firstOrFail();
       
    foreach ($role_ids as $role_id) {

        //role object call on role ids
        $role_object  = Role::where("id",$role_id)->firstOrFail();        
        //dd($role_object);
        $user_obj->assignRole($role_object);
    }

   $user_obj->save();
}
return Redirect::back();
}

}

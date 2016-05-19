<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <h1>Add roles to users, Add permissions to roles</h1>
        <form method="POST" action="/assignroletouser">
          {!! csrf_field() !!}
         <select name="user" class="selectpicker" multiple data-max-options="2">
@foreach($users as $all)
      <option value="{{$all->id}}">{{$all->name}}</option>
      @endforeach
</select>

<div class="checkbox">
@foreach ($roles as $rw)
    {!! Form::checkbox('rw[]', $rw->id) !!}
    {!! Form::label('roles', $rw->name) !!}<br>
    <input type="hidden" value="{{$rw->name}}"></input>
@endforeach
    </div>
    <button type="submit" class="default">Add Permission To User</button>
    </form>
        

        <hr>
        @foreach($users as $user)
         <form method="POST" action="/revoke/userrole/{{$user->id}}">
         {!! csrf_field() !!}
        {{$user->name}}
        @foreach($user->roles as $ro)
         {!! Form::checkbox('ro[]', $ro->id, true) !!}
    {!! Form::label('roles', $ro->name) !!}
    <input type="hidden" value="{{$ro->id}}"></input>
        @endforeach
        <button type="submit" class="default">Revoke</button>
         </form>
        @endforeach
  @foreach($roles as $r)
   <form method="POST" action="/revoke/permission/{{$r->id}}">
  <select name="role" class="selectpicker" multiple data-max-options="2">
           <option value="{{$r->id}}">{{$r->name}}</option>
           </select>
           @foreach($r->permissions as $u)
           
          {!! csrf_field() !!}
           {!! Form::checkbox('u[]', $u->id, true) !!}
    {!! Form::label('permisssion', $u->name) !!}<br>
     <input type="hidden" value="{{$u->id}}"></input>
   
        @endforeach
           <button type="submit" class="default">Revoke permissions of roles played</button>
            </form>
        @endforeach    
         
 <hr>
 <form method="POST" action="/give/permission">
    {!! csrf_field() !!}

      <select name="role" class="selectpicker" multiple data-max-options="2">
      @foreach($roles as $r)
      <option value="{{$r->id}}">{{$r->name}}</option>
      @endforeach
</select>
<div class="checkbox">
@foreach ($perm as $p)
    {!! Form::checkbox('p[]', $p->id) !!}
    {!! Form::label('permisssion', $p->name) !!}<br>
@endforeach
    </div>
    <button type="submit" class="default">Give permission to roles</button>
    </form>
  <hr>
    </body>
</html>

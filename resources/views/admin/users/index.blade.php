@extends('layouts.admin')

@section('content')
    @if(Session::has('deleted_users'))
        <p class="bg-danger">{{session('deleted_users')}}</p>
    @endif

    <h1>Users</h1>
     <table class="table table-hover">
         <thead>
           <tr>
               <th>ID</th>
               <th>NAME</th>
               <th>Role</th>
               <th>Photo</th>
               <th>Status</th>
               <th>Email</th>
               <th>Created</th>
               <th>Updated</th>
           </tr>
         </thead>
         <tbody>
         @if($users)
             @foreach($users as $user)
                 <tr>
                     <td>{{$user->id}}</td>
                     <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></td>
                     <td>{{$user->role->name}}</td>
                     <td><img height="50" src="{{$user->photo ? $user->photo->file : "http://placehold.it/400x400"}}" alt=""></td>
                     <td>{{$user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
                     <td>{{$user->email}}</td>
                     <td>{{$user->created_at->diffForHumans()}}</td>
                     <td>{{$user->updated_at->diffForHumans()}}</td>
                 </tr>
             @endforeach
             @endif


         </tbody>
       </table>
@stop
@extends('layouts.admin')
@section('content')
    @if(Session::has('post_deleted'))
        <p class="bg-danger">{{session('post_deleted')}}</p>
        @endif
    <h1>Post</h1>

     <table class="table table-hover">
         <thead>
           <tr>
             <th>ID</th>
               <th>Photo</th>
             <th>Owner</th>
             <th>Category</th>
               <th>Title</th>
               <th>Body</th>
               <th>Created</th>
               <th>Updated</th>
           </tr>
         </thead>
         <tbody>
         @if ($posts)
             @foreach($posts as $post)
                 <tr>
                     <td>{{$post->id}}</td>
                     <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
                     <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->user->name}}</a></td>
                     <td>{{$post->category_id}}</td>
                     <td>{{$post->title}}</td>
                     <td>{{str_limit($post->body,30)}}</td>
                     <td>{{$post->created_at->diffForHumans()}}</td>
                     <td>{{$post->updated_at->diffForHumans()}}</td>
                     <td></td>
                 </tr>
             @endforeach
         @endif

         </tbody>
       </table>
@stop
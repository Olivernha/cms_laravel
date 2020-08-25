@extends('layouts.admin')
@section('content')
    <h1>Categories</h1>
    <div class="col-sm-6">
         {!! Form::open(['method' => 'POST','action'=>'AdminCategoriesController@store']) !!}
                <div class="form-group">
                 {!! Form::label('name', 'Name :') !!}
                 {!! Form::text('name',null,['class' =>'form-control']) !!}
                </div>
                <div class="form-group">
                {!! Form::submit('Create Category',['class'=>'btn btn-primary']) !!}
                </div>
             {!! Form::close() !!}
    </div>
    <div class="col-sm-6">
        @if($categories)
             <table class="table table-hover">
                 <thead>
                   <tr>
                     <th>ID</th>
                     <th>Name</th>
                     <th>Created_at</th>
                       <th>Updated_at</th>
                   </tr>
                 </thead>
                 <tbody>
                 @foreach($categories as $cat)
                   <tr>
                     <td>{{$cat->id}}</td>
                     <td><a href="{{route('admin.categories.edit',$cat->id)}}">{{$cat->name}}</a></td>
                     <td>{{$cat->created_at ? $cat->created_at->diffForHumans() : 'no date'}}</td>
                       <td>{{$cat->updated_at ? $cat->updated_at->diffForHumans() : 'no date'}}</td>
                   </tr>
                 @endforeach
                 </tbody>
               </table>
        @endif
    </div>
@stop
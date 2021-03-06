@extends('layouts.admin')
@section('content')
    <h1>Media</h1>
    @if ($photos)
        <form action="delete/media" method="post" class="form-inline">
            {{csrf_field()}}
            {{method_field('delete')}}
            <div class="form-group">
                <select name="checkBoxArray" id="" class="form-control">
                    <option value="">Delete</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="delete_all" class="btn btn-primary">
            </div>
             <table class="table table-hover">
                 <thead>
                   <tr>
                       <th><input type="checkbox" id="options"></th>
                     <th>ID</th>
                     <th>Name</th>
                     <th>Created</th>
                   </tr>
                 </thead>
                 <tbody>
                 @foreach($photos as $photo)
                     <tr>
                         <td><input class="checkbox" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                         <td>{{$photo->id}}</td>
                         <td><img height="50" src="{{$photo->file}}" alt=""></td>
                         <td>{{$photo->created_at ? $photo->created_at :'No date' }}</td>
                         <td>
                             <input type="hidden" name="photo" value="{{$photo->id}}">
                             <input type="submit" name="delete_single" value="Delete" class="btn btn-danger">
                         </td>
                     </tr>
                 @endforeach

                 </tbody>
               </table>
        </form>
    @endif

@stop
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#options').click(function () {
               if(this.checked)
               {
                   $('.checkbox').each(function () {
                            this.checked= true;
                   })
               }
               else{
                   $('.checkbox').each(function () {
                       this.checked= false;
                   })
               }

            })
        })
    </script>
@stop
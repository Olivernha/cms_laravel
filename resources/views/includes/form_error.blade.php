@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $errs)
                <li>{{$errs}}</li>
            @endforeach
        </ul>
    </div>
    @endif
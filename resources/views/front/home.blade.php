@extends('layouts.blog-home')

@section('content')
    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">


            <!-- First Blog Post -->
            @if ($posts)
                @foreach($posts as $post)
            <h2>
                <a href="#">{{$post->title}}</a>
            </h2>
            <p class="lead">
                by <a href="index.php">{{ $post->user->name}}</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> {{$post->updated_at}}</p>
            <hr>
            <img class="img-responsive" src="{{isset($post->photo) ? $post->photo : 'https://via.placeholder.com/500x350' }}" alt="">
            <hr>
            <p>{{str_limit($post->body,800)}}</p>
            <a class="btn btn-primary" href="/post/{{$post->slug}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>

            <!--Pagination -->
                <div class="row">
                    <div class="col-md-12 col-sm-offset-3">
                        {{$posts->render()}}
                    </div>
                </div>

            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>
                @endforeach
            @endif
        </div>

        <!-- Blog Sidebar -->
        @include('includes.front_sidebar')

    </div>
    <!-- /.row -->
@endsection

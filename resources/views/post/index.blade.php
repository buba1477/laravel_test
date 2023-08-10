@extends('layouts.main')

@section('content')
    <div xmlns="http://www.w3.org/1999/html">
        <a class="btn btn-success mb-3" href="{{route('post.create')}}">Добавить пост</a>
    </div>

    <div>
        @foreach($posts as $key=>$post)
            <div><a href="{{route('post.show',$post->id)}}">{{$post['id']}}. {{$post->title}}</a></div>
        @endforeach

        <div class="mt-3">
            {{$posts->withQueryString()->links()}}
        </div>
    </div>

@endsection

@extends('layouts.main')

@section('content')
    <div>

            <div>Заголовок: {{$post->title}}</div>
            <div>Содержание: {{$post->post_content}}</div>

    </div>
    <div>
        <a href="{{route('post.edit', $post->id)}}">Update</a>
    </div>
    <div>
        <form action="{{route('post.delete', $post->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Delete" class="btn btn-danger">
        </form>
    </div>
    <div>
        <a href="{{route('post.index')}}">Back</a>
    </div>

@endsection

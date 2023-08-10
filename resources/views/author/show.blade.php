@extends('layouts.main')

@section('content')
    <div>

        <div>Имя: {{$author->firstname}}</div>
        <div>Фамилия: {{$author->lastname}}</div>

    </div>
    <div>
        <a href="{{route('author.edit', $author->id)}}">Update</a>
    </div>
    <div>
        <form action="{{route('author.delete', $author->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Delete" class="btn btn-danger">
        </form>
    </div>
    <div>
        <a href="{{route('author.index')}}">Back</a>
    </div>

@endsection

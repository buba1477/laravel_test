@extends('layouts.main')
@section('content')
    <div>
        <a class="btn btn-success mb-3" href="{{route('author.create')}}">Добавить автора</a>
    </div>

    <div>
    @foreach($autors as $key=>$autor)
        <div><a href="{{route('author.show',$autor->id)}}">{{$key+1}}. {{$autor->firstname}} {{$autor->lastname}} {{$autor->age}}</a></div>
    @endforeach
</div>
@endsection

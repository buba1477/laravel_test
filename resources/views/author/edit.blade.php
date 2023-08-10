@extends('layouts.main')

@section('content')
    <div>
        <form action="{{route('author.update', $author->id)}}" method="post">
            @csrf
            @method('patch')

            {{--            @if ($errors->any())--}}
            {{--                <div class="alert alert-danger">--}}
            {{--                    <ul>--}}
            {{--                        @foreach ($errors->all() as $error)--}}
            {{--                            <li>{{ $error }}</li>--}}
            {{--                        @endforeach--}}
            {{--                    </ul>--}}
            {{--                </div>--}}
            {{--            @endif--}}
            <div class="form-group  mb-3">
                <label for="firstname">Firstname</label>
                <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Имя автора" value="{{$author->firstname}}">
            </div>
            @error('firstname')
            <div class="alert alert-danger">Поле имя не должно быть пустым</div>
            @enderror
            <div class="form-group  mb-3">
                <label for="lastname">Lastname</label>
                <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Фамилия автора" value="{{$author->lastname}}">
            </div>
            @error('lastname')
            <div class="alert alert-danger">Поле фамилия не должно быть пустым</div>
            @enderror

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

@endsection

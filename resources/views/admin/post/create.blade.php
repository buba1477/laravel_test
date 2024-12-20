@extends('layouts.admin')
@section('content')
<div class="container w-50">
<form method="POST" action="{{route('store.post')}}">
    @CSRF
    <div class="form-group">
        <input type="text" name="title" class="form-control" id="title" placeholder="Заголовок" value="{{old('title')}}">
    </div>
    <div class="form-group">
        <textarea name="post_content" class="form-control" rows="3" placeholder="Введи текст...">{{old('post_content')}}</textarea>
    </div>
    <div class="form-group">
        <select name="tags[]" class="select2" multiple="multiple" data-placeholder="Выбери теги" style="width: 100%;">
           @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->title}}</option>
           @endforeach

        </select>
    </div>
    <div class="form-group">
        <input type="text" name="image" class="form-control" id="image" placeholder="Путь до изображения">
    </div>
    <div class="form-group">
    <select name="category_id" class="form-control">
        <option selected hidden>Выбрать категорю</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
    </select>
    </div>
    <div class="form-group">
        <input type="number" name="likes" class="form-control" id="likes" placeholder="Лайки">
    </div>
    <button type="submit" class="btn btn-primary">Отправить</button>
</form>
</div>

@endsection

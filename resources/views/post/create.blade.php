@extends('layouts.main')

@section('content')
    <div>
        <form action="{{route('post.store')}}" method="post">
            @csrf
            <div class="form-group  mb-3">
                <label for="title">Title</label>
                <input
                    value="{{ old('title') }}"
                    type="text" name="title" class="form-control" id="title" placeholder="Заголовок статьи">
            </div>
            @error('title')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <div class="form-group mb-3">
                <label for="content">Content</label>
                <textarea
                    name="post_content" class="form-control" id="post_content"
                    placeholder="Содержание статьи"> {{ old('post_content') }}</textarea>
            </div>
            @error('content')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <div class="form-group mb-3">
                <label for="image">Image</label>
                <input
                    value="{{ old('image') }}"
                    type="text" name="image" class="form-control" id="image" placeholder="Картинка">
            </div>
            @error('image')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <div class="form-group mb-3">
                <label for="likes">Likes</label>
                <input type="text" name="likes" class="form-control" id="likes" placeholder="Колличество лайков">
            </div>
{{--            <div class="form-group mb-3">--}}
{{--                <label for="id_author">Author</label>--}}
{{--                <input type="text" name="id_author" class="form-control" id="id_author" placeholder="Автор">--}}
{{--            </div>--}}
            <div class="form-group mb-3">
                <label for="category_id">Категории</label>
                <select class="form-control" id="category_id" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{old('category_id') == $category->id ? 'selected':''}}
                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="tags">Выбрать тэги</label>
                <select multiple class="form-control" id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

@endsection

@extends('layouts.main')

@section('content')
    <div>
        <form action="{{route('post.update', $post->id)}}" method="post">
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
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Заголовок статьи" value="{{$post->title}}">
            </div>
            @error('title')
            <div class="alert alert-danger">Поле title не должно быть пустым</div>
            @enderror
            <div class="form-group mb-3">
                <label for="post_content">Content</label>
                <textarea  name="post_content" class="form-control" id="title" placeholder="Содержание статьи" >{{$post->post_content}}</textarea>
            </div>
            <div class="form-group mb-3">
                <label for="image">Image</label>
                <input type="text" name="image" class="form-control" id="title" placeholder="Картинка" value="{{$post->image}}">
            </div>
            <div class="form-group mb-3">
                <label for="likes">Likes</label>
                <input type="text" name="likes" class="form-control" id="title" placeholder="Колличество лайков" value="{{$post->likes}}">
            </div>
{{--            <div class="form-group mb-3">--}}
{{--                <label for="id_author">Author</label>--}}
{{--                <input type="text" name="id_author" class="form-control" id="title" placeholder="Автор" value="{{$post->id_author}}">--}}
{{--            </div>--}}
            <div class="form-group mb-3">
                <label for="category_id">Категории</label>
                <select class="form-control" id="category_id" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{$category->id == $post->category->id ? 'selected': ''}}
                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="tags">Выбрать тэги</label>
                <select multiple class="form-control" id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option
                        @foreach($post->tags as $postTag)
                            {{$tag->id == $postTag->id ? 'selected': ''}}
                        @endforeach
                        value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

@endsection

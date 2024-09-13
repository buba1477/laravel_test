<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--    <link rel="stylesheet" href="{{asset('build/assets/app-3f1c4ee8.css')}}">--}}

{{--    <script rel="stylesheet" src="{{asset('build/assets/app-d2de35d2.js')}}"></script>--}}
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
    <title>Document</title>

</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Главная</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('main.index')}}">Main</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('post.index')}}">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about.index')}}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact.index')}}">Contacts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('author.index')}}">Autors</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')

</div>

</body>
</html>

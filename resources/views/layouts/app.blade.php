<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/style.css">
</head>
<body>
<header>
    <h1>{{config('app.name')}}</h1>
    <div class="buttons">
        <a class="button" href="/">Главная</a>

        @auth
            <a class="button" href="{{route('home')}}">Аккаунт</a>
        @endauth

        @can('isAdmin', auth()->user())
            <a class="button button-type-admin" href="/admin">Админ-панель</a>
        @endcan

        @auth
            <button class='button button-type-admin write-open'>Написать</button>
            <form action="{{route('logout')}}" method="POST" class="form-exit">
                @csrf
                <button type="submit" class="button button-type-exit">Выйти</button>
            </form>
        @endauth
        @guest
            <a class="button" href="{{route('login')}}">Логин</a>
            <a class="button" href="{{route('register')}}">Регистрация</a>
        @endguest
    </div>
</header>

{{--Форма написания статьи--}}
<div class='write-form add-form'>
    <form action="{{route('submit')}}" method="post" enctype="multipart/form-data">
        @csrf
        <p>
            <label for="title" style='font-size: 23px;'>Заголовок</label>
        </p>
        <p>
            <input class='title-input' type="text" name='title'>
        </p>

        <p>
            <label for="text" style='font-size: 21px;'>Текст</label>
        </p>
        <p>
            <textarea class='text-input' name="text"></textarea>
        </p>

        <p>
            <label for="photo" style="font-size: 20px">Фото</label>
        </p>
        <p>
            <input type="file" name="photo">
        </p>
        <p>
            <button type="submit" class="button write-button">Выложить</button>
        </p>
    </form>
</div>

{{--Форма ошибки--}}
@if($errors->any())
    <div class="write-form error" @if($errors->any()) style="display: block" @endif>
        <h3>Ошибка</h3>
        <div class='error-text'>
            @error('title')
            <p>{{$message}}</p>
            @enderror

            @error('text')
            <p>{{$message}}</p>
            @enderror
        </div>
        <button class="button button-type-exit close-error-form">Закрыть</button>
    </div>
@endif

<script>
    const button = document.querySelector('.write-open');
    const form = document.querySelector('.add-form');

    const error_form = document.querySelector('.error');
    const close_error_form = document.querySelector('.close-error-form');

    button.addEventListener('click', () => {
        form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
    });
    error_form.addEventListener('click', () => {
        error_form.style.display = 'none';
    })
</script>

@yield('main')

</body>
</html>

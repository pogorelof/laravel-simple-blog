<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/style.css">
</head>
<body>
<header>
    @auth
        <div class="account">
            <img class="avatar" src="/storage/{{Auth::user()->photo_path}}">
            <div class="avatar-selector">
                <form action="{{route('logout')}}" method="POST" class="form-exit">
                    @csrf
                    <a class="button" href="{{route('home')}}">{{__('text.home')}}</a>
                    <br> <br>
                    <button class="button button-type-exit" type="submit">{{__('text.exit')}}</button>
                </form>
            </div>
        </div>
    @endauth

    @guest
        <h3>{{__('text.guest')}}</h3>
    @endguest
        <a href="/"><h1>{{config('app.name')}}</h1></a>
    <div class="buttons">
        <a class="button" href="/">{{__('text.main')}}</a>

        @can('isAdmin', auth()->user())
            <a class="button button-type-admin" href="/admin">{{__('text.admin')}}</a>
        @endcan

        @auth
            <button class='button button-type-admin write-open'>{{__('text.write')}}</button>
        @endauth
        @guest
            <a class="button" href="{{route('login')}}">{{__('text.login')}}</a>
            <a class="button" href="{{route('register')}}">{{__('text.register')}}</a>
        @endguest

        <a class="button" href="{{route('change_language')}}">{{__('text.language')}}</a>
    </div>
</header>

{{--Форма написания статьи--}}
<div class='write-form add-form'>
    <form action="{{route('submit')}}" method="post" enctype="multipart/form-data">
        @csrf
        <p>
            <label for="title" style='font-size: 23px;'>{{__('text.title')}}</label>
        </p>
        <p>
            <input class='title-input' type="text" name='title'>
        </p>

        <p>
            <label for="text" style='font-size: 21px;'>{{__('text.text')}}</label>
        </p>
        <p>
            <textarea class='text-input' name="text"></textarea>
        </p>

        <p>
            <label for="photo" style="font-size: 20px">{{__('text.photo')}}</label>
        </p>
        <p>
            <input type="file" name="photo">
        </p>
        <p>
            <button type="submit" class="button write-button">{{__('text.send')}}</button>
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

            @error('name')
            <p>{{$message}}</p>
            @enderror

            @error('password')
            <p>{{$message}}</p>
            @enderror
            @error('password_confirmation')
            <p>{{$message}}</p>
            @enderror
            @error('email')
            <p>{{$message}}</p>
            @enderror
        </div>
        <button class="button button-type-exit close-error-form">{{__('text.close')}}</button>
    </div>
@endif

<script>
    //форма отправки статьи
    const button = document.querySelector('.write-open');
    const form = document.querySelector('.add-form');

    if(button && form){
        button.addEventListener('click', () => {
            form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
        });
    }

    //логика аватара
    const avatar = document.querySelector('.account');
    const avatar_selector = document.querySelector('.avatar-selector');
    if(avatar && avatar_selector){
        avatar.addEventListener('mouseover', () => {
            avatar_selector.style.display = 'block';
        })
        avatar.addEventListener('mouseout', () => {
            avatar_selector.style.display = 'none';
        })
    }

    //форма ошибки
    const error_form = document.querySelector('.error');
    const close_error_form = document.querySelector('.close-error-form');
    error_form.addEventListener('click', () => {
        error_form.style.display = 'none';
    })
</script>

@yield('main')

</body>
</html>

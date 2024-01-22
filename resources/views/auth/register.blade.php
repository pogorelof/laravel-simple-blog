@extends('layouts.app')

@section('main')

    <form action="{{route('register')}}" class='auth-form' method='post' enctype="multipart/form-data">
        @csrf
        <h2>Регистрация</h2>

        <p>
            <label for="login">Логин:</label>
            <input type="text" name="name" required>
        </p>
        <p>
            <label for="login">Email:</label>
            <input type="text" name="email" required>
        </p>
        <p>
            <label for="password">Пароль:</label>
            <input type="password" name="password" required>
        </p>
        <p>
            <label for="password_repeat">Повторите пароль:</label>
            <input type="password" name="password_confirmation" required>
        </p>

        <p>
            <label for="photo">Фото:</label>
            <input type="file" name="photo">
        </p>

        <button class='button' type='submit'>Зарегистрироваться</button>
    </form>
@endsection

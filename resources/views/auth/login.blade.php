@extends('layouts.app')

@section('main')
    <form action="{{route('login')}}" class='auth-form' method='post'>
        @csrf
        <h2>Логин</h2>

        <p>
            <label for="login">Логин:</label>
            <input type="text" name="name" required>
        </p>

        <p>
            <label for="password">Пароль:</label>
            <input type="password" name="password" required>
        </p>

        <button class='button' type='submit'>Войти</button>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember"
                   id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember"> Запомнить меня </label>
        </div>
    </form>
@endsection

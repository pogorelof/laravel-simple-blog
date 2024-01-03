@extends('layouts.app')

@section('main')
    <form action="{{route('login')}}" class='auth-form' method='post'>
        @csrf
        <h2>Логин</h2>

        <p>
            <label for="login">Логин:</label>
            <input type="text" name="name" required>
        </p>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <p>
            <label for="password">Пароль:</label>
            <input type="password" name="password" required>
        </p>
        @error('password')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror

        <button class='button' type='submit'>Войти</button>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember"
                   id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember"> Запомнить меня </label>
        </div>
    </form>
@endsection

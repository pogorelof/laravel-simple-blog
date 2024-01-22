@extends('layouts.app')

@section('main')

    <form action="{{route('register')}}" class='auth-form' method='post' enctype="multipart/form-data">
        @csrf
        <h2>{{__('text.register')}}</h2>

        <p>
            <label for="login">{{__('text.login')}}:</label>
            <input type="text" name="name" required>
        </p>
        <p>
            <label for="login">Email:</label>
            <input type="text" name="email" required>
        </p>
        <p>
            <label for="password">{{__('text.password')}}:</label>
            <input type="password" name="password" required>
        </p>
        <p>
            <label for="password_repeat">{{__('text.repeat_password')}}:</label>
            <input type="password" name="password_confirmation" required>
        </p>

        <p>
            <label for="photo">{{__('text.photo')}}:</label>
            <input type="file" name="photo">
        </p>

        <button class='button' type='submit'>{{__('text.to_register')}}</button>
    </form>
@endsection

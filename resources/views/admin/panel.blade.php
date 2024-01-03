@extends('layouts.admin')

@section('main')
    <div class='block-list'>
        <p><a href="{{route('admin.users')}}">Пользователи</a></p>
        <p><a href="{{route('admin.articles')}}">Статьи</a></p>
        <p><a href="{{route('index')}}">Обратно на сайт</a></p>
    </div>
@endsection
`

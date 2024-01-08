@extends('layouts.app')

@section('main')
    <div class='blog'>
        @foreach($articles as $article)
        <div class='card'>
            <h3 class='card-title'>
                    {{ $article['title'] }}
            </h3>

            <img class="card-image" src="/storage/{{$article['photo_path']}}">

            <p class='card-text'>
                    {{ $article['text'] }}
            </p>
            <p class='card-date'>
                Автор: {{$article->user->name}}
            </p>
            <p class='card-date'>
                Опубликовано: {{ $article['created_at'] }}
            </p>
        </div>
        @endforeach
    </div>
@endsection

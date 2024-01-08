@extends('layouts.app')

@section('main')
    <div class='blog'>
        @foreach($articles as $article)
            <div class='card'>
                <a class='link' href="{{route('detail', ['id' => $article->id])}}">
                    <h3 class='card-title'>
                        {{ $article['title'] }}
                    </h3>
                </a>

                <a class='link' href="{{route('detail', ['id' => $article->id])}}">
                    <img class="card-image" src="/storage/{{$article['photo_path']}}">
                </a>

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

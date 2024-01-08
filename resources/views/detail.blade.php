@extends('layouts.app')

@section('main')
    <div class='blog'>
            <div class='card'>
                <h3 class='card-title'>
                    {{ $article['title'] }}
                </h3>

                <div class="detail">
                    <div class="a">
                        <img class="card-image" src="/storage/{{$article['photo_path']}}">
                    </div>

                    <div class="b">
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
                </div>
            </div>
    </div>
@endsection

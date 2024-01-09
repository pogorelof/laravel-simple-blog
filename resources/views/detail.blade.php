@extends('layouts.app')

@section('main')
{{--  Card of Article  --}}
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
        {{--  Comments  --}}
        <div class="comments">
            <h2>Комментарии: </h2>
            <div class="one-comment">
                <p><b>User</b> - 2024-2-1</p>
                <hr>
                <p>
                    qweqweeqw
                </p>
            </div>
            <form>
                <p>
                    <input>
                </p>
                <p>
                    <button class="button">Написать!</button>
                </p>
            </form>
        </div>
    </div>
@endsection

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
            @foreach($comments as $comment)
            <div class="one-comment">
                <div class="one-comment-header">
                    <p><b>{{$comment->user->name}}</b> - {{$comment->created_at}}</p>
                    @if(Auth::check() && $comment->user_id == Auth::user()->id)
                    <a class="button button-delete" href="{{route('comment.delete', ['comment' => $comment->id])}}">
                        <p>
                            Удалить
                        </p>
                    </a>
                    @endif
                </div>
                <hr>
                <p>
                    {{$comment->text}}
                </p>
            </div>
            @endforeach
            <form action="{{route('comment.submit', ['article' => $article['id']])}}" method="post">
                @csrf
                <p>
                    <input name="text">
                </p>
                <p>
                    <button class="button">Написать!</button>
                </p>
            </form>
        </div>
    </div>
@endsection

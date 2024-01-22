@extends('layouts.app')

@section('main')
<h1 style='padding-left: 15px;'>{{__('text.home.title')}}</h1>
<div class='blog'>
    @foreach($articles as $article)
    <div class="card profile-card">
        <h3 class='card-title'>
                <?= $article['title'] ?>
        </h3>

        <img class="card-image" src="/storage/{{$article['photo_path']}}">

        <p class='card-text'>
                <?= $article['text'] ?>
        </p>
        <p class='card-date'>
            {{__('text.published')}}: <?= $article['created_at'] ?>
        </p>
        <hr><br>
        <button class='button edit-button' style='font-size:100%' value=<?= $article['id'] ?>>{{__('text.edit')}}</button>
        <form method="POST" action="{{route('delete', ['id' => $article['id']])}}">
            @csrf
            @method('DELETE')
            <button type='submit' class='button button-type-exit'>{{__('text.delete')}}</button>
        </form>
        </div>
    @endforeach
        <div class="pagination">
            {{ $articles->links() }}
        </div>
</div>
@foreach($articles as $article)
    <div class='write-form edit-form-<?= $article['id'] ?>' style='display: none; padding:10px;'>
    <form action="{{route('update', ['id' => $article['id']])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <p>
            <label for="title" style='font-size: 23px;'>{{__('text.title')}}</label>
        </p>
        <p>
            <textarea class='title-input' type="text" name='title'> <?= $article['title'] ?> </textarea>
        </p>
        <p>
            <label for="text" style='font-size: 21px;'>{{__('text.text')}}</label>
        </p>
        <p>
            <textarea class='text-input' name="text"><?= $article['text'] ?></textarea>
        </p>

        <p>
            <label for="photo" style="font-size: 20px">{{__('text.replace_photo')}}</label>
            <input type="file" name="photo">
        </p>

        <p>
            <button type="submit" class="button write-button" name='id' value=<?= $article['id'] ?>>{{__('text.edit')}}</button>
        </p>
    </form>
    <button class="button button-type-exit close" value=<?= $article['id'] ?>>{{__('text.close')}}</button>
</div>
@endforeach
<script>
    const buttons = document.querySelectorAll('.edit-button');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const id = button.value;
            const form2 = document.querySelector(`.edit-form-${id}`)
            form2.style.display = 'block';

        });
    });

    const closes = document.querySelectorAll('.close')
    closes.forEach(close => {
        close.addEventListener('click', () => {
            const id = close.value;
            const form2 = document.querySelector(`.edit-form-${id}`)
            form2.style.display = 'none'
        })
    })
</script>
@endsection

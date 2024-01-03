@extends('layouts.admin')

@section('main')
    <div class='items'>
        <button><a href="/admin/">Назад</a></button>
        <h2>Статьи</h2>
        <hr>

        <form action="{{route('admin.delete_several_article')}}" method='POST'>
            @csrf
            <table>
                <thead>
                <tr>
                    <th></th>
                    <th>Название</th>
                    <th>Автор</th>
                    <th>Дата</th>
                    <th>Действия</th>
                </tr>
                </thead>
                @foreach($articles as $article)
                <tr>
                    <td>
                        <input type="checkbox" name=<?= $article['id'] ?>>
                    </td>
                    <td>
                        <label for=<?= $article['id'] ?>><?= $article['title'] ?></label>
                    </td>
                    <td>
                        <label for=<?= $article['id'] ?>><a href="user_list.php?search=">{{$article->user->name}}</a></label>
                    </td>
                    <td>

                        <label for=<?= $article['id'] ?>><?= $article['created_at'] ?></label>
                    </td>
                    <td>
                        <!-- Редактор заголовка -->
                        <button class='title-edit-button' value=<?= $article['id'] ?>>Редактировать заголовок</button>
                        <div style='display: none;' class='title-edit-<?= $article['id'] ?>'>
                            <form action=""></form>
                            <form action="{{route('admin.article_title_update', ['id' => $article['id']])}}" method='post'>
                                @csrf
                                @method('PATCH')
                                <div class='title-form'>
                                    <textarea name='title'><?= $article['title'] ?></textarea>
                                    <button type="submit">Изменить</button>
                                </div>
                            </form>
                        </div>

                        <!-- Редактор текста -->
                        <button class='text-edit-button' value=<?= $article['id'] ?>>Редактировать текст</button>
                        <div style='display: none;' class='text-edit-<?= $article['id'] ?>'>
                            <form action=""></form>
                            <form action="{{route('admin.article_text_update', ['id' => $article['id']])}}" method='post'>
                                @csrf
                                @method('PATCH')
                                <div class='text-form'>
                                    <textarea name='text'><?= $article['text'] ?></textarea>
                                    <button type="submit">Изменить</button>
                                </div>
                            </form>
                        </div>

                        <!-- Кнопка удаления -->
                        <form action="{{route('admin.article_delete', ['id' => $article['id']])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

            <hr>
            <button type='submit'>Удалить отмеченные</button>
        </form>
    </div>

    <script src='/js/article_list.js'></script>
@endsection

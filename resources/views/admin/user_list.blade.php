@extends('layouts.admin')

@section('main')
    <div class='items'>
        <button><a href="/admin/">Назад</a></button>
        <h2>Пользователи</h2>
        <form action="{{route('admin.search')}}" class='search' method="POST">
            @csrf
            <input type="text" name="search">
            <button type='submit'>Найти</button>
            <button type='submit'><a href="{{route('admin.users')}}">Все</a></button>
        </form>
        <hr>

        <form action="{{route('admin.delete_several_users')}}" method='POST'>
{{--            TODO: поиск--}}
            @csrf
            <table>
                <thead>
                <tr>
                    <th></th>
                    <th>Имя</th>
                    <th>Роль</th>
                    <th>Действия</th>
                </tr>
                </thead>
                @foreach($users as $user)
                <tr>
                    <td>
                        <input type="checkbox" name=<?= $user['id'] ?>>
                    </td>
                    <td>
                        <label for=<?= $user['id'] ?>><?= $user['name'] ?></label>
                    </td>
                    <td>

                        <label for=<?= $user['id'] ?>><?= $user['role'] ?></label>
                    </td>
                    <td>
                        <button class='password-edit-button' value=<?= $user['id'] ?>>Редактировать пароль</button>
                        <div style='display: none;' class='password-edit-<?= $user['id'] ?>'>
                            <form action=""></form>
                            <form action="{{route('admin.update_password', ['id' => $user['id']])}}" method='post'>
                                @csrf
                                @method('PATCH')
                                <input type="password" name='newpass'>
                                <button type="submit">Изменить</button>
                            </form>
                        </div>

                        <form action="{{route('admin.delete_user', ['id' => $user['id']])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

            <hr>
            <button type='submit'>Удалить отмеченных</button>
        </form>
    </div>

    <script src='/js/user_list.js'></script>
@endsection

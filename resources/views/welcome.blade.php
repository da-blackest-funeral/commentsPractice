<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Гостевая книга</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

@guest()
    <div class="container">
        <a class="in bg-primary" style="float: right;" href="/registration">Регистрация</a>
        <a class="in bg-primary me-5" style="float: right;" href="/login">Вход</a>
    </div>
@endguest

@auth()
    <div class="container">
        <a class="in bg-primary" style="float: right;" href="/logout">Выйти</a>
    </div>
@endauth

<div id="wrapper">

    <h1>Гостевая книга</h1>

    @include('templates.allComments')

    <div id="form">
        <form action="/?page={{ $allComments->currentPage() }}" method="POST">
            @csrf
            <p><input class="form-control" name="name" placeholder="Ваше имя" required></p>
            <p><textarea class="form-control" name="message" placeholder="Ваш отзыв" required></textarea></p>
            <p><input type="submit" class="in in-info in-block" value="Сохранить"></p>
        </form>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>

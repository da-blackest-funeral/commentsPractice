<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        /* Fonts */
        .body {
            font-family: 'Montserrat', sans-serif;
        }

        /* Указание родительского свойства */
        .flat {
            position: relative;
            width: 305px;
            box-shadow: 0 7px 16px rgba(0, 0, 0, 0.01);
            border: 1px solid #D1E0F9;
            border-radius: 5px;
        }

        /* Абсолютное (попиксельное типо) позиционирование относительного родителя (класса выше), задаем top и left в качестве "отступов" */
        .flat__status {
            position: absolute;
            z-index: 1;
            top: 25px;
            left: 25px;
            display: flex;
            align-items: center;
            padding: 10px 14px;
            border-radius: 3px;
            font-style: normal;
            font-weight: 500;
            font-size: 12px;
            background: #7BCB14;
            color: #fff;
        }

        .check {
            margin-right: 7px;
        }

        .flat__info {
            display: flex;
            flex-direction: column;
            padding: 25px 25px 40px 25px;
        }

        .flat__image {
            width: 304px;
            height: 269px;
            border-radius: 5px 5px 0 0;
        }

        .flat__name {
            font-style: normal;
            font-weight: 600;
            font-size: 16px;
            line-height: 28px;
            margin-bottom: 20px;
        }

        .flat__address {
            display: flex;
            margin-bottom: 16px;
        }

        .map {
            margin-right: 7px;
        }

        .flat__city {
            font-style: normal;
            font-weight: normal;
            font-size: 12px;
            line-height: 12px;
            color: #1D4178;
        }

        .flat__link {
            font-style: normal;
            font-weight: normal;
            font-size: 12px;
            line-height: 12px;
            text-decoration-line: underline;
            color: #FF3324;
            cursor: pointer;
        }

        .flat__price {
            display: flex;
            margin-bottom: 15px;
        }

        .price {
            margin-right: 5px;
        }

        .flat__cost {
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            line-height: 28px;
            color: #2F4B77;
        }

        .flat__type {
            display: flex;
            margin-bottom: 35px;
        }

        .flatIcon {
            margin-right: 9px;
        }

        .flat__desc {
            max-width: 198px;
            font-style: normal;
            font-weight: normal;
            font-size: 12px;
            line-height: 12px;
            color: #666666;
        }

        .flat__button {
            padding: 13px 84px;
            font-style: normal;
            font-weight: bold;
            font-size: 14px;
            line-height: 18px;
            text-decoration: none;
            text-align: center;
            background: #FF3324;
            border-radius: 3px;
            color: #fff;
        }
    </style>
    <title>Flat Sample</title>
</head>
<body class="body">
@foreach($all as $flat)
    <div class="flat">
        <div class="flat__status">
            <img class="check" src="../img/checkMark.svg" alt="Иконка: сдан">
            @if($flat->is_rented)
                Сдан
            @else
                Свободен
            @endif
        </div>
        <img src="{{ asset('/storage/flat.jpg') }}" alt="Картинка квартиры" class="flat__image">
        <div class="flat__info">
            <div class="flat__name">ЖК "Кубанская Марка"</div>
            <div class="flat__address">
                <img class="map" src="../img/map.svg" alt="Иконка: адрес">
                <address class="flat__city">{{ $flat->adress }}</address>
            </div>
            <div class="flat__price">
                <img src="../img/price.svg" alt="Иконка: цена" class="price">
                <strong class="flat__cost">от {{ $flat->price }} руб</strong>
            </div>
            <div class="flat__type">
                <img src="../img/flat.svg" alt="Иконка: типы квартир" class="flatIcon">
                <span class="flat__desc">{{  $flat->description  }}</span>
            </div>
            <a href="#" class="flat__button">Подробнее</a>
        </div>
    </div>
@endforeach
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hosting</title>

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> -->
        <link rel="stylesheet" type="text/css" href="\resources\css\style.css">

    </head>

<div class="header">
        <img src="" id="logo">      
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bibi-youtube" viewBox="0 0 16 16"><path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z">
        </svg>
        <h1 id="naming">Видеохостинг!</h1>
        <div id="menu">
            @guest
            <div id="tomain" style="cursor: pointer; margin: auto 0;" 
            onclick="document.getElementById('mainpage').style.display='flex';
            document.getElementById('watchpage').style.display='none';
            document.getElementById('myvideospage').style.display='none';
            document.getElementById('newvideopage').style.display='none';">Главная</div>
            <div id="towatch" style="cursor: pointer;  margin: auto 0;"
            onclick="document.getElementById('mainpage').style.display='none';
            document.getElementById('watchpage').style.display='flex';
            document.getElementById('myvideospage').style.display='none';
            document.getElementById('newvideopage').style.display='none';">Просмотр</div>
            @else
            <div id="tomain" style="cursor: pointer; margin: auto 0;"
            onclick="document.getElementById('mainpage').style.display='flex';
            document.getElementById('watchpage').style.display='none';
            document.getElementById('myvideospage').style.display='none';
            document.getElementById('newvideopage').style.display='none';">Главная</div>
            <div id="towatch" style="cursor: pointer;  margin: auto 0;"
            onclick="document.getElementById('mainpage').style.display='none';
            document.getElementById('watchpage').style.display='flex';
            document.getElementById('myvideospage').style.display='none';
            document.getElementById('newvideopage').style.display='none';">Просмотр</div>
            <div id="tomyvideos" style="cursor: pointer;  margin: auto 0;"
            onclick="document.getElementById('mainpage').style.display='none';
            document.getElementById('watchpage').style.display='none';
            document.getElementById('myvideospage').style.display='flex';
            document.getElementById('newvideopage').style.display='none';">Мои видео</div>
            <div id="tonewvideo" style="cursor: pointer;  margin: auto 0;"
            onclick="document.getElementById('mainpage').style.display='none';
            document.getElementById('watchpage').style.display='none';
            document.getElementById('myvideospage').style.display='none';
            document.getElementById('newvideopage').style.display='flex';"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bibi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg>Добавить видео</div>
            @endguest
        </div>
        @if (Route::has('login'))
        <div id="login">
            @auth
            <!-- <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a> -->
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
            onclick="document.getElementById('mainpage').style.display='none';
            document.getElementById('watchpage').style.display='none';
            document.getElementById('myvideospage').style.display='none';
            document.getElementById('newvideopage').style.display='flex';">{{ Auth::user()->name }}</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            @endauth
            @guest
            @if (Route::has('login'))
            <h1 id="loginin"><a href="{{ route('login') }}">Вход</a></h1>
            @endif
            @if (Route::has('register'))
            <h1 id="registrin"><a href="{{ route('register') }}">Регистрация</a></h1>
            @endif
            @endguest
        </div>
        @endif
</div>
@extends('mainpage')
@extends('watchpage')
@extends('myvideospage')
@extends('newvideopage')
    <div class="main"></div>
<script type="text/javascript" src="/resources/js/script.js"></script>
</body>
</html>
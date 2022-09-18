<title>Просмотр видео</title>
<style type="text/css">
    body{
        margin: 0;
    }
    video{
        max-height: 80vh;
    }
    .all{
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: black;
    }
    .cen{
        text-align: center;
    }
    .videoname{
        font-size: 4vw;
        cursor: default;
    }
    .date{
        color:slategrey;
        font-size: 1.5vw;
        cursor: default;
    }
    .con{
        display: flex;
        justify-content: space-evenly;
        padding-top: 1.5vw;
        padding-bottom: 2vw;
        border-bottom: 0.5vw solid black;
        border-radius: 5vw;
    }
    .con2{
        display: flex;
        font-size: 2vw;
        align-items: center;
    }
    .likes{
        display: flex;
        align-items: center;
        cursor: pointer;
    }    
    .dislikes{
        display: flex;
        align-items: center;
        cursor: pointer;
    }
    .dropdown-menu-right{
        display: flex;
        align-items: center;
    }
    .opisanie{
        font-size: 1.2vw;
        max-width: 40vw;
        word-wrap: break-word;
        white-space: pre-wrap;
    }
    .op{
        font-size: 1.5vw;
    }
    .tcon{
        display: flex;
        margin-top: 2vw;
        justify-content: space-evenly;
    }
    .header{
        border-bottom: 0.4vw solid darkgreen;
    }
    .down{
        width: 100%;
        height: 2vw;
    }
    .delbut{
        font-size: 2vw;
        align-items: center;
        margin: 1vw;
        display: flex;
        align-items: center;
        cursor: pointer;
        color: white;
        border: none;
        outline: none; 
        background: none;
        transition: all .3s ease;
        text-decoration: none;
    }
    .delbut:hover{
        color: grey;
    }
    .comments{
        max-width: 40vw;
        word-wrap: break-word;
        /*white-space: pre-wrap;*/
    }
    .comm{
        margin-bottom: 1vw;
        font-size: 1.2vw;
    }
    .commname{
        font-size: 2vw;
    }
    .commdate{
        margin-top: 0.3vw;
        color: slategrey;
        font-size: 1vw;
    }
</style>
<link rel="stylesheet" type="text/css" href="\resources\css\style.css">
<div class="header">
        <img src="" id="logo">      
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bibi-youtube" viewBox="0 0 16 16"><path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z">
        </svg>
        <h1 id="naming">Видеохостинг!</h1>
        <div id="menu">
            <a id="tomain" style="cursor: pointer; margin: auto 0;"
            href="{{route('main')}}">Главная</a>
        </div>
        @if (Route::has('login'))
        <div id="login">
            @auth
            <!-- <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a> -->
            <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
            href="{{route('main')}}">{{ Auth::user()->name }}</a>
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
@isset($vid)
@if(DB::table('videos')->where('id',$id)->get()[0]->warning==0||DB::table('videos')->where('id',$id)->get()[0]->warning==2)
    <video class="all" controls="controls">
            <source src="{{ asset('//hosting/storage/app/public/'.$vid)}}" type="video/mp4">
    </video>
<div class="con">
    <div class="con1">
        <div class="videoname">{{DB::table('videos')->where('id',$id)->get()[0]->name}}</div>
        <div class="date">Загружен: {{DB::table('videos')->where('id',$id)->get()[0]->created_at}}</div>
    </div>
    <div class="con2">
    @auth
        @if(count(DB::table('appraisal')->where('idvideo',$id)->where('iduser',Auth::user()->id)->where('appraisal',1)->get())>0)
        <style type="text/css">
            .bi-hand-thumbs-up{
                fill: steelblue;
            }
        </style>
        @endif
        @if(count(DB::table('appraisal')->where('idvideo',$id)->where('iduser',Auth::user()->id)->where('appraisal',2)->get())>0)
        <style type="text/css">
            .bi-hand-thumbs-down{
                fill:  steelblue;
            }
        </style>
        @endif
    
        <form method="POST" action="{{route('appraisal')}}">
            {{csrf_field()}}
            <input hidden name="iduser" value="{{Auth::user()->id}}">
            <input hidden name="appraisal" value="1">
            <input hidden name="idvideo" value="{{$id}}">
            <button class="delbut">
            <div class="likes">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2vw" height="2vw" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                        <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                    </svg>
                    {{DB::table('videos')->where('id',$id)->get()[0]->likes}}
                    <!-- count(DB::table('appraisal')->where('idvideo',$id)->where('appraisal',1)->get())}} -->
            </div>
            </button>
        </form>
        <form method="POST" action="{{route('appraisal')}}">
            {{csrf_field()}}
            <input hidden name="iduser" value="{{Auth::user()->id}}">
            <input hidden name="appraisal" value="2">
            <input hidden name="idvideo" value="{{$id}}">
            <button class="delbut">
            <div class="dislikes">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2vw" height="2vw" fill="currentColor" class="bi bi-hand-thumbs-down" viewBox="0 0 16 16">
                        <path d="M8.864 15.674c-.956.24-1.843-.484-1.908-1.42-.072-1.05-.23-2.015-.428-2.59-.125-.36-.479-1.012-1.04-1.638-.557-.624-1.282-1.179-2.131-1.41C2.685 8.432 2 7.85 2 7V3c0-.845.682-1.464 1.448-1.546 1.07-.113 1.564-.415 2.068-.723l.048-.029c.272-.166.578-.349.97-.484C6.931.08 7.395 0 8 0h3.5c.937 0 1.599.478 1.934 1.064.164.287.254.607.254.913 0 .152-.023.312-.077.464.201.262.38.577.488.9.11.33.172.762.004 1.15.069.13.12.268.159.403.077.27.113.567.113.856 0 .289-.036.586-.113.856-.035.12-.08.244-.138.363.394.571.418 1.2.234 1.733-.206.592-.682 1.1-1.2 1.272-.847.283-1.803.276-2.516.211a9.877 9.877 0 0 1-.443-.05 9.364 9.364 0 0 1-.062 4.51c-.138.508-.55.848-1.012.964l-.261.065zM11.5 1H8c-.51 0-.863.068-1.14.163-.281.097-.506.229-.776.393l-.04.025c-.555.338-1.198.73-2.49.868-.333.035-.554.29-.554.55V7c0 .255.226.543.62.65 1.095.3 1.977.997 2.614 1.709.635.71 1.064 1.475 1.238 1.977.243.7.407 1.768.482 2.85.025.362.36.595.667.518l.262-.065c.16-.04.258-.144.288-.255a8.34 8.34 0 0 0-.145-4.726.5.5 0 0 1 .595-.643h.003l.014.004.058.013a8.912 8.912 0 0 0 1.036.157c.663.06 1.457.054 2.11-.163.175-.059.45-.301.57-.651.107-.308.087-.67-.266-1.021L12.793 7l.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581 0-.211-.027-.414-.075-.581-.05-.174-.111-.273-.154-.315l-.353-.354.353-.354c.047-.047.109-.176.005-.488a2.224 2.224 0 0 0-.505-.804l-.353-.354.353-.354c.006-.005.041-.05.041-.17a.866.866 0 0 0-.121-.415C12.4 1.272 12.063 1 11.5 1z"/>
                    </svg>
                    {{DB::table('videos')->where('id',$id)->get()[0]->dislikes}}
                    <!-- count(DB::table('appraisal')->where('idvideo',$id)->where('appraisal',2)->get())}} -->
            </div>
            </button>
        </form>
    @endauth
    @guest
    <a class="likes delbut" href="{{ route('login') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2vw" height="2vw" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                        <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                    </svg>
                    {{DB::table('videos')->where('id',$id)->get()[0]->likes}}
                    <!-- count(DB::table('appraisal')->where('idvideo',$id)->where('appraisal',1)->get())}} -->
            </a>
        <a class="dislikes delbut" href="{{ route('login') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2vw" height="2vw" fill="currentColor" class="bi bi-hand-thumbs-down" viewBox="0 0 16 16">
                        <path d="M8.864 15.674c-.956.24-1.843-.484-1.908-1.42-.072-1.05-.23-2.015-.428-2.59-.125-.36-.479-1.012-1.04-1.638-.557-.624-1.282-1.179-2.131-1.41C2.685 8.432 2 7.85 2 7V3c0-.845.682-1.464 1.448-1.546 1.07-.113 1.564-.415 2.068-.723l.048-.029c.272-.166.578-.349.97-.484C6.931.08 7.395 0 8 0h3.5c.937 0 1.599.478 1.934 1.064.164.287.254.607.254.913 0 .152-.023.312-.077.464.201.262.38.577.488.9.11.33.172.762.004 1.15.069.13.12.268.159.403.077.27.113.567.113.856 0 .289-.036.586-.113.856-.035.12-.08.244-.138.363.394.571.418 1.2.234 1.733-.206.592-.682 1.1-1.2 1.272-.847.283-1.803.276-2.516.211a9.877 9.877 0 0 1-.443-.05 9.364 9.364 0 0 1-.062 4.51c-.138.508-.55.848-1.012.964l-.261.065zM11.5 1H8c-.51 0-.863.068-1.14.163-.281.097-.506.229-.776.393l-.04.025c-.555.338-1.198.73-2.49.868-.333.035-.554.29-.554.55V7c0 .255.226.543.62.65 1.095.3 1.977.997 2.614 1.709.635.71 1.064 1.475 1.238 1.977.243.7.407 1.768.482 2.85.025.362.36.595.667.518l.262-.065c.16-.04.258-.144.288-.255a8.34 8.34 0 0 0-.145-4.726.5.5 0 0 1 .595-.643h.003l.014.004.058.013a8.912 8.912 0 0 0 1.036.157c.663.06 1.457.054 2.11-.163.175-.059.45-.301.57-.651.107-.308.087-.67-.266-1.021L12.793 7l.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581 0-.211-.027-.414-.075-.581-.05-.174-.111-.273-.154-.315l-.353-.354.353-.354c.047-.047.109-.176.005-.488a2.224 2.224 0 0 0-.505-.804l-.353-.354.353-.354c.006-.005.041-.05.041-.17a.866.866 0 0 0-.121-.415C12.4 1.272 12.063 1 11.5 1z"/>
                    </svg>
                    {{DB::table('videos')->where('id',$id)->get()[0]->dislikes}}
                    <!-- count(DB::table('appraisal')->where('idvideo',$id)->where('appraisal',2)->get())}} -->
            </a>
    @endguest
    </div>
</div>
<div class="tcon">
    <div class="opisanie"><div class="op">Описание:</div>{{DB::table('videos')->where('id',$id)->get()[0]->description}}</div>
    <div class="comments"><div class="op">Коментарии:</div>
            @auth
                <form method="POST" action="{{route('Comment')}}">
                    {{csrf_field()}}
                    <input hidden name="idvideo" value="{{$id}}">
                    <input hidden name="iduser" value="{{Auth::user()->id}}">
                    <input type="text" name="comment" maxlength="254">
                    <button type="submit">Отправить</button>
                </form>
            @endauth
        @if(count(DB::table('videocomments')->where('idvideo',$id)->get())>0)
            @for($i=0;$i < count(DB::table('videocomments')->where('idvideo',$id)->latest()->get());$i++)
                <div class="comm">
                    <div class="commname">{{DB::table('users')->where('id',DB::table('videocomments')->where('idvideo',$id)->latest()->get()[$i]->idusercomment)->get()[0]->name}}</div>
                    <div>{{DB::table('videocomments')->where('idvideo',$id)->latest()->get()[$i]->comment}}</div>
                    <div class="commdate">{{DB::table('videocomments')->where('idvideo',$id)->latest()->get()[$i]->created_at}}</div>
                </div>
            @endfor
        @else
        <h1>Комментариев к этому видео нету</h1>
        @endif
    </div>
</div>
@else
<h1 class="cen">Данный видеоролик не доступен!</h1>
@endif
@endisset
<div class="down"></div>
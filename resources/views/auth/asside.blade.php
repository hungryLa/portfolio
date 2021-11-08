<div class="container h-100" style="">
    @if(auth())
        <h4>{{$user->SFname()}}</h4>
    @endif
    <ul class="list-group">
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="{{route('main.page')}}" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                Главная
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="#">Мужчины</a></li>
                <li><a class="dropdown-item" href="#">Девушки</a></li>
            </ul>
        </div>
        @guest()
            <li class="list-group-item"><a href="">Личный кабинет(Для не зарегистрированных)</a></li>
        @endguest
        @auth
            <li class="list-group-item"><a href="{{route('user.page',$user->login)}}">Портфолио</a></li>
            <li class="list-group-item"><a href="{{route('user.edit',$user->login)}}">Личный кабинет</a></li>
        @endauth

    </ul>
</div>

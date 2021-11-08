@extends("layouts.master")

@section("title")Главная@endsection

@section('asside')
    @include('inc.asside',compact('user'))
@endsection

@section("content")
    <h1>Главная</h1>
    <ul>
        @guest()
            <li><a href="{{route('login')}}">Войти</a></li>
            <li><a href="{{route('register')}}">Зарегистрироваться</a></li>
        @endguest
        @auth()
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit">Выйти</button>
            </form>
        @endauth
    </ul>
@endsection

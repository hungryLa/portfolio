@extends("layouts.master")

@section("title")Портфолио {{$user->SFname()}}@endsection

@section("asside")
    @include('inc.asside')
@endsection

@section("content")
    <h1>Porfolio</h1>
    @foreach($user->files as $file)
        @include('card',compact('content'))
    @endforeach
@endsection

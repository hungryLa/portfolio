@extends("layouts.master")

@section("title")Портфолио@endsection

@section("asside")
    @include('inc.asside')
@endsection

@section("content")
    <h1>Porfolio</h1>
    @foreach($model->contents as $content)
        @include('card',compact('content'))
    @endforeach
@endsection

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div id="borderBody" class="min-vh-100">
    <div class="row h-100">
        <div class="col-2 bg-primary">
            @auth()
                @include('auth.asside')
            @endauth
            @guest()
                @include('inc.asside')
            @endguest
        </div>
        <div class="col-10 bg-danger">
            @if(session()->has('success'))
                <p class="alert alert-success">{{session()->get('success')}}</p>
            @elseif(session()->has('warning'))
                <p class="alert alert-warning">{{session()->get('warning')}}</p>
            @endif
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>

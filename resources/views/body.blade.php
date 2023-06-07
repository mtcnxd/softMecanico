<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Mecanica</title>

    @yield('css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="{{ asset('main.css') }}" rel="stylesheet" >

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    @yield('js')
</head>
<body>
    <div class="main-nav">
        <div class="row">
            <div class="col-md-6">
                <h2 class="main-title">Edomains</h2>
            </div>
            <div class="col-md-6" style="align-items:center; display:flex; flex-direction:row-reverse;">
                <img class="rounded-circle" src="{{ asset('images/profile.png') }}" width="48px" height="48px">
            </div>
        </div>
    </div>    
    @include('includes.sidebar')

    <div class="content">
        @yield('content')
    </div>
</body>
</html>
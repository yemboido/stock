<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel 8 Livewire CRUD Operation Tutorial From Scratch - laratutorials.com</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.css')}}">
        <!-- Styles -->
   
    </head>
<body>
    <div class="container mt-5">
    @if ($errors->any())
    <div class="alert alert-danger">
    <strong>Whoops!</strong> Erreurs dans votre saisies.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
    @endif

     {{ $slot }}
     @yield('content')
    </div>
    @livewireScripts
</body>
</html>
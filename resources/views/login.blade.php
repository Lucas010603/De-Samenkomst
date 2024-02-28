<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>

<body class="text-center">

<form class="form-signin" method="POST" action="{{ url('/api/login') }}">
    @csrf
    <img class="mb-4" id="logo" src="{{ asset('images/De-Samenkomst-LOGO.png') }}" alt="">
    <h1 class="h3 mb-3 font-weight-normal">Inloggen</h1>
    <label for="inputEmail" class="sr-only">E-mailadres</label>
    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="E-mailadres" required autofocus>
    <label for="inputPassword" class="sr-only">wachtwoord</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="wachtwoord" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Inloggen</button>
    <p class="mt-5 mb-3 text-muted invisible">.</p>
</form>
</body>
</html>

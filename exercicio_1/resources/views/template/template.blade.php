<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- Styles -->

</head>
<body >
<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="/ex1">Ex1</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/ex2">Ex2</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/ex3">Ex3</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/ex4" >Ex4</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/ex5" >Ex5</a>
    </li>
</ul>
    @yield('body')
</body>
</html>

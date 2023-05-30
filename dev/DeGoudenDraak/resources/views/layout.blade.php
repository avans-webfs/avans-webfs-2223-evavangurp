<!DOCTYPE html>
<html lang="nl">
    <head>
        <title>De Gouden Draak</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- boostrap required voor slider -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous" defer></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('/css/app.css')}}">
        <script src="{{ asset('/js/dropdown.js') }}" defer></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-xl navbar-light bg-danger">
            <div class="container">
                <a class="navbar-brand text-dark me-2" href="/">
                    <img src="/img/dragon-small.png" alt="Gouden Draak logo" aria-label="Logo van de Gouden Draak" id="logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="main-navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="btn btn-outline-warning me-2 {{ (request()->segment(1) == 'menu') ? 'font-weight-bold' : '' }}" href="/menu">Menukaart</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-warning me-2 {{ (request()->segment(1) == 'specialties') ? 'font-weight-bold' : '' }}" href="/specialties">Aanbiedingen</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-warning me-2 {{ (request()->segment(1) == 'news') ? 'font-weight-bold' : '' }}" href="/news">Nieuws</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-warning me-2 {{ (request()->segment(1) == 'contact') ? 'font-weight-bold' : '' }}" href="/contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-warning me-2 {{ (request()->segment(1) == 'login') ? 'font-weight-bold' : '' }}" href="/login">Inloggen</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
        @yield('content')
        </div>
    </body>
</html>
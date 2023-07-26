<!--Admin layout-->

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
                    <a class="btn btn-outline-warning me-2 {{ (request()->segment(1) == 'menu') ? 'font-weight-bold' : '' }}" href="/admin/menu">Menukaart</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-warning me-2 {{ (request()->segment(1) == 'specialties') ? 'font-weight-bold' : '' }}" href="/admin/specialties">Specialiteiten</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-warning me-2 {{ (request()->segment(1) == 'news') ? 'font-weight-bold' : '' }}" href="/admin/news">Nieuws</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-warning me-2 {{ (request()->segment(1) == 'contact') ? 'font-weight-bold' : '' }}" href="/admin/orders">Bestellingen</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-warning me-2 {{ (request()->segment(1) == 'register') ? 'font-weight-bold' : '' }}" href="/register">Nieuw account registreren</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-warning {{ (request()->segment(1) == 'profile') ? 'font-weight-bold' : '' }}"
                    id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">
                            Profiel
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{route('logout')}}" class="dropdown-item"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Uitloggen
                            </a>
                        </form>
                    </li>
                </ul>
            </li>
            </ul>
        </div>
    </div>
</nav>
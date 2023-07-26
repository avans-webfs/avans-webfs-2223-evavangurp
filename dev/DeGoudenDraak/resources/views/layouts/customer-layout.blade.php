<!--Customer layout-->

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
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{route('logout')}}" class="btn btn-outline-warning me-2"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            Uitloggen
                        </a>
                    </form>
                </li>
                <li class="nav-item">
                    {{ Auth::user()->name }}
                </li>
            </ul>
        </div>
    </div>
</nav>
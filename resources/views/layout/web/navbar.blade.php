<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('home') }}">Home</a>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('posts.index') ? 'active' : '' }}"
                            href="{{ route('posts.index') }}">
                            My Posts</a>
                    </li>
                @endauth

            </ul>
            <div class="d-flex">
                @auth
                    <a href="{{ route('posts.index') }}" class="btn btn-sm btn-primary mx-2">{{ auth()->user()->name }}</a>
                    <a href="{{ route('logout') }}" class="btn btn-sm btn-danger">Logout</a>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="btn btn-sm btn-primary mx-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-sm btn-success">Register</a>
                @endguest
            </div>
        </div>
    </div>
</nav>

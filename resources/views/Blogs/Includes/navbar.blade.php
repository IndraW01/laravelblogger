<nav class="navbar-main">
    <div class="container">
        <a href="{{ route('blogs.index') }}" class="brand"><i class='bx bxs-flame'></i> Blogger</a>
        <ul class="nav-menu">
            <li><a href="#">Product</a></li>
            <li><a href="#">Company</a></li>
            <li><a href="{{ route('blogs.index') }}" class="active">Blog</a></li>
            @auth
                <li class="login"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                <form action="{{ route('logout.index') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout btn">Logout</button>
                </form>
            @else
                <li class="login"><a href="{{ route('login.index') }}">Login</a></li>
                <li class="signup"><a href="{{ route('register.index') }}">Signup</a></li>
            @endauth

        </ul>
        <i class='bx bx-menu toggle-menu' ></i>
    </div>
</nav>

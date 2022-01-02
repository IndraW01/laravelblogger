<main id="posts-content">
    <div class="container">
        <ul class="categories">
            @if (request('category'))
                <li><a href="{{ route('blogs.index') }}">All Categories</a></li>
            @else
                <li><a href="{{ route('blogs.index') }}" class="active">All Categories</a></li>
            @endif
            @foreach ($categories as $category)
                @if (request('category') == $category->slug_category)
                    <li><a class="active" href="{{ route('blogs.index') }}?category={{ $category->slug_category }}">{{ $category->title_category }}</a></li>
                @else
                    <li><a href="{{ route('blogs.index') }}?category={{ $category->slug_category }}">{{ $category->title_category }}</a></li>
                @endif
            @endforeach
        </ul>

        <div class="content">
            <div class="left">
                @yield('content')
                <div class="container paginate-mobile">
                    <div class="paginate">
                        {{ $posts->fragment('posts-content')->links() }}
                    </div>
                </div>
            </div>
            <div class="right">
                <form action="{{ route('blogs.index') }}" method="GET">
                    <h3 class="sub-title">Search Post</h3>
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <input type="text" name="search" placeholder="Search Title..." value="{{ request('search') }}">
                </form>
                <div>
                    <h3 class="sub-title">Follow Us</h3>
                    <ul class="social-link">
                        <li><a href="#"><i class='bx bxl-facebook' ></i></a></li>
                        <li><a href="#"><i class='bx bxl-instagram' ></i></a></li>
                        <li><a href="#"><i class='bx bxl-linkedin' ></i></a></li>
                        <li><a href="#"><i class='bx bxl-twitter' ></i></a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="sub-title">Latest Post</h3>
                    <ul class="posts">
                        @foreach ($latestPosts->take(3) as $post)
                            <li>
                                <a href="{{ route('blogs.show', ['post' => $post->slug]) }}">
                                    <img src="{{ asset('img/img.png') }}" alt="Gambar">
                                    <span>{{ $post->title }}...</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container paginate-dekstop">
        <div class="row justify-content-center">
            <div class="col">
                {{ $posts->fragment('posts-content')->links() }}
            </div>
        </div>
    </div>
</main>

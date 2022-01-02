<section id="top-post">
    <div class="container">
        <div class="wrapper">
            <div class="left">
                <img src="{{ asset('img/img.png') }}" alt="Gambar">
            </div>
            <div class="right">
                <span class="time">{{ $latestPosts[0]->updated_at }}</span>
                <a href="#" class="link-post">{{ $latestPosts[0]->title }}</a>
                <div class="profile">
                    <img src="{{ asset('img/' . $latestPosts[0]->user->gambar) }}" alt="{{ $latestPosts[0]->user->name }}" width="48px" height="48px" class=" rounded-circle">
                    <span class="name">John Doe</span>
                </div>
                <p>{{ $latestPosts[0]->excerpt }}</p>
                <div class="body-category">
                    @forelse ($latestPosts[0]->categories as $category)
                        <span class="category">{{ $category->title_category }}</span>
                    @empty
                        <span class="category">Web Programming</span>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

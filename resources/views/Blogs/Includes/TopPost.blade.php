<section id="top-post">
    <div class="container">
        <div class="wrapper">
            <div class="left">
                <img src="{{ asset('img/img.png') }}" alt="Gambar">
            </div>
            <div class="right">
                <span class="time">{{ $posts[0]->updated_at }}</span>
                <a href="#" class="link-post">{{ $posts[0]->title }}</a>
                <div class="profile">
                    <img src="{{ asset('img/' . $posts[0]->user->gambar) }}" alt="{{ $posts[0]->user->name }}" width="48px" height="48px" class=" rounded-circle">
                    <span class="name">John Doe</span>
                </div>
                <p>{{ $posts[0]->excerpt }}</p>
                <span class="category">Web Programming</span>
            </div>
        </div>
    </div>
</section>

{{-- @dd($posts) --}}
@extends('Blogs.Layouts.main')

@section('content')
@forelse ($posts as $post)
    <div class="post">
        <img src="{{ asset('img/img.png') }}" alt="Gambar">
        <div class="body-category">
            @forelse ($post->categories as $category)
                <span class="category">{{ $category->title_category }}</span>
            @empty
                <span class="category">Web Programming</span>
            @endforelse
        </div>
        <span class="time">{{ $post->updated_at }}</span>
        <a href="{{ route('blogs.show', ['post' => $post->slug]) }}#top-post" class="link-post">{{ $post->title }}</a>
        <p class="link-post-excerpt">{{ $post->excerpt }}</p>
        <div class="profile">
            <img src="{{ asset('img/' . $post->user->gambar) }}" alt="{{ $post->user->name }}" width="48px" height="48px" class=" rounded-circle">
            <span class="name">{{ $post->user->name }}</span>
        </div>
    </div>
@empty
    <div class="post">
        <h3>Post Not Found</h3>
    </div>
@endforelse

@endsection

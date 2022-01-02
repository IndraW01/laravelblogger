@extends('Blogs.Layouts.main')

@section('show')

<section id="top-post">
    <div class="container">
        <div class="wrapper">
            <div class="category-img">
                <img src="{{ asset('img/img.png') }}" alt="">
            </div>
            <div class="content-show">
                <h3 class="text-center">{{ $post->title }}</h3>
                <div class="category-show text-center">
                    @foreach ($post->categories as $category)
                        <span class="category-show-sub">{{ $category->title_category }}</span>
                    @endforeach
                </div>
                <p class="text-center mt-3 category-author"><small>{{ $post->updated_at }}, {{ $post->user->name }}</small></p>
                <div class="body-show">
                    {!! $post->body !!}
                </div>
                <div class="category-comment">
                    <h6 class="text-center mt-5">{{ $post->loadCount('comments')->comments_count }} Comments</h6>
                    <div class="comment-sub mt-4">
                        @forelse ($post->load('comments')->comments as $comment)
                        <div class="row justify-content-center align-items-center mb-4">
                            <div class="comment-user-img col-md-1 text-end">
                                <img src="{{ asset('img/' . $comment->user->gambar) }}" alt="{{ $comment->user->name }}" width="70px" height="70px" class=" rounded-circle">
                            </div>
                            <div class="col-md-7">
                                <p class="comment-user-name">{{ $comment->user->name }}</p>
                                <p class="comment-user-body">{{ $comment->comment }}</p>
                            </div>
                        </div>
                        @empty
                        <div class="row justify-content-center">
                            <div class="col">
                                <p class="text-center">No Comments</p>
                            </div>
                        </div>
                        @endforelse
                        <div class="container mt-3">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <form action="" method="POST" class="text-center">
                                        @csrf
                                        <div class="mb-3 text-center leave-comment">
                                            <label for="comment" class="form-label mb-3">Leave Comment</label>
                                            <textarea class="form-control" id="comment" placeholder="Message" rows="4"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>


@endsection

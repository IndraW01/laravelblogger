<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<title>Bloga</title>
</head>
<body>

	<!-- NAVBAR -->
	@include('Blogs.Includes.navbar')
	<!-- NAVBAR -->

	<!-- HEADER -->
	<header>
		<div class="container">
			<span>Blogger</span>
			<h1>Add Your Article And See Other Articles</h1>
		</div>
	</header>
	<!-- HEADER -->

	<!-- TOP POST -->
	@include('Blogs.Includes.TopPost')
	<!-- TOP POST -->

	<!-- MAIN -->
	<main id="posts-content">
		<div class="container">
			<ul class="categories">
				<li><a href="#" class="active">All Categories</a></li>
				<li><a href="#">Marketing</a></li>
				<li><a href="#">Social</a></li>
				<li><a href="#">Web Programming</a></li>
				<li><a href="#">Engineering</a></li>
			</ul>

			<div class="content">
				<div class="left">
                    @yield('content')
				</div>
				<div class="right">
					<form action="#">
						<h3 class="sub-title">Search Post</h3>
						<input type="text" placeholder="Search...">
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
                                    <a href="#">
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
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    {{ $posts->fragment('posts-content')->links() }}
                </div>
            </div>
        </div>
	</main>
	<!-- MAIN -->

	<!-- FOOTER -->
	<footer>
		<div class="container">
			<a href="#" class="brand"><i class='bx bxs-flame'></i> Bloga</a>
			<p>Copyright &copy;2021. All Right Reserved</p>
		</div>
	</footer>
	<!-- FOOTER -->

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>

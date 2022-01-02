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

    @yield('show')
    @isset($index)
        <!-- TOP POST -->
        @include('Blogs.Includes.TopPost')

        <!-- TOP POST -->

        <!-- MAIN -->
        @include('Blogs.Includes.maincontent')
        <!-- MAIN -->
    @endisset

	<!-- FOOTER -->
	<footer>
		<div class="container">
			<a href="#" class="brand"><i class='bx bxs-flame'></i> Blogger</a>
			<p>Copyright &copy;2021. All Right Reserved</p>
		</div>
	</footer>
	<!-- FOOTER -->

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>

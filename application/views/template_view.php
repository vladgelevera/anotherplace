<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title><?= $title; ?></title>

	<!-- Bootstrap -->
	<link href="../../css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles -->
	<link href="../../css/style.css" rel="stylesheet">

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="../../js/bootstrap.min.js"></script>

	<!-- Custom JavaScript -->
	<script src="../../js/my.js"></script>

	<!-- Google fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Hind+Vadodara' rel='stylesheet' type='text/css'>

	<!-- Favicon -->
	<link rel="icon" href="/media/images/favicon.ico" type="image/x-icon" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">Anotherplace</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li <?php if ($content_view == 'main_view.php' || $content_view == 'mobile_main_view.php') echo 'class="active"'; ?>><a href="/">Home</a></li>
					<li <?php if ($content_view == 'blog_view.php') echo 'class="active"'; ?>><a href="/blog">Blog</a></li>
					<li <?php if ($content_view == 'about_view.php') echo 'class="active"'; ?>><a href="/about">About</a></li>
					<?php if (isset($_COOKIE['admin'])): ?><li <?php if ($content_view == 'cp_view.php') echo 'class="active"'; ?>><a href="/admin">Control panel</a></li><?php endif; ?>
					<?php if (isset($_COOKIE['admin'])): ?><li><a href="/admin/logout" OnClick="return confirm('Are you sure you want to logout?')">Logout</a></li><?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>
	<?php include 'application/views/' . $content_view; ?>
	<footer class="footer">
		<div class="container">
			<p>Made by VG. <?= date(Y, time()); ?>.</p>
		</div>
	</footer>
</body>
</html>
<nav class="navbar navbar-expand-sm bg-light">
	<?php
    if(!isset($_SESSION['login_user']))
    {
		echo "<ul class='navbar-nav'>";
		echo "<li class='nav-item'><a class='nav-link' href='index.php'>Home</a></li>";
		echo "<li class='nav-item'><a class='nav-link' href='registration.php'>Register</a></li>";
		echo "<li class='nav-item'><a class='nav-link' href='login.php'>Login</a></li>";
		echo "</ul>";
    }
    else
    {
		echo "<ul class='navbar-nav'>";
		echo "<li class='nav-item'><a class='nav-link' href='index.php'>Home</a></li>";
		echo "</ul>";
		echo "<ul class='navbar-nav ml-auto'>";
		echo "<li class='nav-item'><a class='nav-link'>Hello, " . $_SESSION['login_user'] . "</a></li>";
		echo "<li style='float: right' class='nav-item'><a class='nav-link' href='logout.php'>Sign out</a></li>";
		echo "</ul>";
    }
	?>
	

</nav>

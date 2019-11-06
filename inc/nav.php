<nav class="navbar navbar-expand-sm navbar-light bg-light">
	<?php
    if(!isset($_SESSION['login_user']) && !isset($_SESSION['login_admin']))
    {
		echo "<ul class='navbar-nav mx-auto text-center'>";
		echo "<li class='nav-item'><a class='nav-link' href='index.php'>Home</a></li>";
		echo "<li class='nav-item'><a class='nav-link' href='registration.php'>Register</a></li>";
		echo "<li class='nav-item'><a class='nav-link' href='login.php'>Login</a></li>";
		echo "</ul>";
	} else if (isset($_SESSION['login_user']))
    {
		echo "<ul class='navbar-nav mx-auto text-center'>";
		echo "<li class='nav-item'><a class='nav-link' href='index.php'>Home</a></li>";
		echo "<li class='nav-item'><a class='nav-link' href='addtocart.php'>Buy</a></li>";
		echo "<li class='nav-item'><a class='nav-link' href='cart.php'>Cart</a></li>";
		echo "</ul>";
		echo "<ul class='navbar-nav ml-auto mx-auto text-center'>";
		echo "<li class='nav-item active'><a class='nav-link'>Hello, " . $_SESSION['login_user_email'] . "</a></li>";
		echo "<li style='float: right' class='nav-item'><a class='nav-link' href='logout.php'>Sign out</a></li>";
		echo "</ul>";
    } else if (isset($_SESSION['login_admin'])){
		echo "<ul class='navbar-nav mx-auto text-center'>";
		echo "<li class='nav-item'><a class='nav-link' href='./add_item.php'>Add Item</a></li>";
		echo "<li class='nav-item'><a class='nav-link' href='./delete_item.php'>Delete Item</a></li>";
		echo "<li class='nav-item'><a class='nav-link' href='./index.php'>Update Item</a></li>";
		echo "</ul>";
		echo "<ul class='navbar-nav ml-auto mx-auto text-center'>";
		echo "<li class='nav-item active'><a class='nav-link'>Hello, " . $_SESSION['login_admin'] . "</a></li>";
		echo "<li style='float: right' class='nav-item'><a class='nav-link' href='./logout.php'>Sign out</a></li>";
		echo "</ul>";
	}
	?>
	

</nav>

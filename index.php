<!-- Home Page
The page will be structed so 'header.php' will be always on the top 
and the "body" part of the page will be different based on $_GET 'url' -->
	<!-- For example if you press a button href=index.php?aboutUs
		it will direct to index.php and ask do you guys have something called "aboutUS"?
		and yes we do, which means the body part of the page will display aboutUs.php -->
<?php include 'header.php';?>
<?php
	if (isset($_GET['aboutUs'])){
		include 'aboutUs.php';
	}else if (isset($_GET['home'])){
		include 'home.php';
	}else if (isset($_GET['contactUs'])){
		include 'contactUs.php';
	}else if (isset($_GET['reviews'])){
		include 'reviews.php';
	}else if (isset($_GET['cart'])){
		include 'cart.php';
	}else if (isset($_GET['services'])){
		include 'services.php';
	}else if (isset($_GET['signUp'])){
		include 'signUp.php';
	}else if (isset($_GET['signIn'])){
		include 'signIn.php';
	}else if (isset($_GET['checkout'])){
		include 'checkout.php';
	}
    else {	
		include 'home.php';
	}
?>
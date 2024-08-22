<?php

require_once ('path.php');

if (isset($_SESSION['active_author'])) {


	$author_id = $_SESSION['active_author'];

	//fetching the user data
	$sql = "SELECT * FROM author WHERE author_id = '$author_id'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$author_data = $result->fetch_assoc();
		extract($author_data);
	}
	
	$is_user_logged = true;


}else{
	$is_user_logged = false;
	$author_role = 0;    // false

}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="x-ua-compatible" content="IE=edge">
	<meta name="author" content="SemiColonWeb">
	<meta name="description"
		content="Create Niche Blog Websites with Canvas Template. Get Canvas to build powerful websites easily with the Highly Customizable &amp; Best Selling Bootstrap Template, today.">

	<!-- Font Imports -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Domine:wght@400;500;700&family=Roboto:wght@400;500&family=Literata:opsz,wght@7..72,700&display=swap"
		rel="stylesheet">

	<!-- Core Style -->
	<link rel="stylesheet" href="style.css">

	<!-- Font Icons -->
	<link rel="stylesheet" href="css/font-icons.css">

	<!-- Niche Demos -->
	<link rel="stylesheet" href="demos/blog/blog.css">
	

	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="icofont/icofont.min.css">

	<!-- Document Title
	============================================= -->
	<title>Tech Connect</title>
	<link rel="icon" type="image/x-icon" href="img/favicon.ico">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


</head>
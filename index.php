<!--
Main Page for SAIT Project
Author: Fantastic 4 (Brian, Jason, Lindsay, and Sunghyun)
Created: 2018-06-01
-->


<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/CustomCSS.css">
</head>
<body>
  <?php 
  include "php/header.php";
  ?>
  <div class="container">
    <?php
		include "php/cities.php";
    ?>
  </div>
<?php include "php/footer.php"?>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

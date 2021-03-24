<?php
echo 
'<!DOCTYPE html>
<html>
	<head>';
		if( basename($_SERVER['PHP_SELF']) == 'plan.php' || basename($_SERVER['PHP_SELF']) == 'index2.php' || basename($_SERVER['PHP_SELF']) == 'index3.php' || basename($_SERVER['PHP_SELF']) == 'index4.php' || basename($_SERVER['PHP_SELF']) == 'index5.php' || basename($_SERVER['PHP_SELF']) == 'merge.php' || basename($_SERVER['PHP_SELF']) == 'count.php' || basename($_SERVER['PHP_SELF']) == 'interest.php' || basename($_SERVER['PHP_SELF']) == 'deleteElement.php' || basename($_SERVER['PHP_SELF']) == 'insertElement.php' || basename($_SERVER['PHP_SELF']) == 'upload.php' || basename($_SERVER['PHP_SELF']) == 'uploadRDF.php' || basename($_SERVER['PHP_SELF']) == 'graduated.php' || basename($_SERVER['PHP_SELF']) == 'moreInterests.php' ){ echo '
		<link rel="stylesheet" type="text/css" href="styles/style.css">
		<link rel = "icon" href ="log/images/hi.png" type = "image/x-icon"> ';}
		else if( basename($_SERVER['PHP_SELF']) == 'register.php' || basename($_SERVER['PHP_SELF']) == 'login.php' || basename($_SERVER['PHP_SELF']) == 'forgot.php' || basename($_SERVER['PHP_SELF']) == 'message.php' || basename($_SERVER['PHP_SELF']) == 'reset.php' ){ echo '
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
			<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
			<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
			<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
			<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
			<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">	
			<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
			<link rel="stylesheet" type="text/css" href="css/util.css">
			<link rel="stylesheet" type="text/css" href="css/main.css">
			<link rel = "icon" href ="images/hi.png" type = "image/x-icon">';
		}
		else if( basename($_SERVER['PHP_SELF']) == 'converter.php' || basename($_SERVER['PHP_SELF']) == 'ocupation.php' ){ echo '
		<link rel="stylesheet" type="text/css" href="../../styles/style.css">
		<link rel = "icon" href ="../../log/images/hi.png" type = "image/x-icon"> ';}
		echo '
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Livvic&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
		<script src="https://kit.fontawesome.com/b48c0c89f2.js" crossorigin="anonymous"></script>
	</head> ';
?>
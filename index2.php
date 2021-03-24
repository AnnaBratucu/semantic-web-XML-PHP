<!DOCTYPE HTML>  
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
</head>
<body>  
<div class="header">
			<?php  
			include 'head.php'; 
			include 'header.php';
			session_start();
			if(!isset($_SESSION['username'])) { //if not yet logged in
			header("Location: log/login.php");// send to login page
			exit;
			}
			$_SESSION[ 'home' ] = 'no'; ?>
</div>


<h2>Create your XML profiles!</h2>
<style>
p{padding:0;margin:0;font-family:"Times New Roman", serif;
letter-spacing: 1px;background-color:#f1f1f1;margin-bottom:5px;margin-top:5px;}
legend{margin-top:10px;border:1px solid #444;padding:5px;margin-bottom:15px;background-color:#6A5ACD;}
fieldset{width:300px;margin-left:20px;border:1px solid #444;padding:5px;}
body{margin-left:400px;margin-right:400px;background-color:#FFE4C4;}
</style>
<form method="post" action="index3.php">  

<legend>General information</legend>

   
	  <div class="table-responsive">  
		   <table class="table table-bordered">  

  <input type="text" name="name" class="form-control name_list" placeholder="Name" required>
    <br><br>
   Gender:
  <input type="radio" name="gender" value="female" required>Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <br><br>

  <input type="text" name="website" class="form-control name_list" placeholder="Website" required>
<br>
  <textarea name="address" rows="5" cols="40" class="form-control name_list" placeholder="Address" required></textarea>
<br>
  <input type="tel" name="telephone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" class="form-control name_list" placeholder="Telephone" required>
<br>
 <!--<input type="text" name="email" class="form-control name_list" placeholder="E-mail" required>-->
<br>
  Birthday <input type="date" name="birth" class="form-control name_list" placeholder="Birthday" required>

  

     </table>  
	  </div>  
  <br><br>
  <input class="btn btn-success" type="submit" name="submit" value="Go to next step">  
</form>


 

</body>
</html>


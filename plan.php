<!DOCTYPE html>
<html>
	<?php include 'head.php'; 
	require_once('settings.php');
	require_once('google-login-api.php');
	require_once "config.php";
	session_start();
	// Google passes a parameter 'code' in the Redirect Url
	if(isset($_GET['code'])) {
		try {
			$gapi = new GoogleLoginApi();
			
			// Get the access token 
			$data = $gapi->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);
			
			// Get user information
			$user_info = $gapi->GetUserProfileInfo($data['access_token']);
		}
		catch(Exception $e) {
			echo $e->getMessage();
			exit();
		}

		if(empty($_SESSION)) // if the session not yet started
		//session_start();
		$_SESSION["username"] = $user_info['email'];

	}
	if( !isset( $_SESSION[ 'home' ] ) || $_SESSION[ 'home' ] != 'yes' ){
		if( $_SESSION[ 'home' ] == 'merge' ) 
			{ header("location: upload.php"); }
		else { header("location: index2.php"); }
	}
	
	?>
<head>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
	<style>
p{padding:0;margin:0;font-family:"Times New Roman", serif;
letter-spacing: 1px;background-color:#f1f1f1;margin-bottom:5px;margin-top:5px;}
legend{margin-top:10px;border:1px solid #444;padding:5px;margin-bottom:15px;background-color:#6A5ACD;}
fieldset{width:300px;margin-left:20px;border:1px solid #444;padding:5px;}
body{margin-left:400px;margin-right:400px;background-color:#FFE4C4;}
.column {
  float: left;
  width: 33.33%;
  padding: 10px;
  height: 300px; 
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.column1 {
  float: left;
  width: 50%;
  padding: 10px;
  height: 300px; 
}
</style>
</head>
	
	<body>
	
	
	

		<?php
			if(empty($_SESSION)) // if the session not yet started
			session_start();

			if(!isset($_SESSION['username'])) { //if not yet logged in
			header("Location: log/login.php");// send to login page
			exit;
			}
		?>

		<div class="header">
			<?php include 'header.php'; ?>
		
			
		</div>
		
<br><br>

<div class="row">
  <div class="column" style="background-color:#99ccff;">
    <form method="post" action="count.php">  
  
  <h4>See the number of your technologic related sbjects</h4><br>
  <input class="btn btn-success" type="submit" name="submit" value="Find out!">  
</form>
  </div>
  <div class="column" style="background-color:#cce6ff;">
    <form method="post" action="extra.php">  
  
  <h4>See all your graduated extra courses</h4><br>
  <input class="btn btn-success" type="submit" name="submit" value="Find out!">  
</form>
  </div>
  <div class="column" style="background-color:#e6ffff;">
    <form method="post" action="interest.php">  
  
  <h4>See all extra-courses of programming passionate users</h4><br>
  <input class="btn btn-success" type="submit" name="submit" value="Find out!">  
</form>
  </div>
</div>
<br><br>

<div class="row">
  <div class="column" style="background-color:#99ccff;">
    <form method="post" action="insertElement.php">  
  
  <h4>Insert a new Job</h4><br>
  <input class="btn btn-success" type="submit" name="submit" value="Go!">  
</form>
  </div>
  <div class="column" style="background-color:#cce6ff;">
    <form method="post" action="deleteElement.php">  
  
  <h4>Delete a Job</h4><br>
  <input class="btn btn-success" type="submit" name="submit" value="Go!">  
</form>
  </div>
  
  <div class="column" style="background-color:#e6ffff;">
    <form method="post" action="uploadRDF1.php">  
  
  <h4>Upload RDF</h4><br>
  <input class="btn btn-success" type="submit" name="submit" value="Go!">  
</form>
  </div>
  
</div>
<br><br>

<div class="row">
  <div class="column" style="background-color:#99ccff;">
    <form method="post" action="easyrdf-0.9.0/examples/ocupation.php">  
  
  <h4>Search by ocupation</h4><br>
  <input class="btn btn-success" type="submit" name="submit" value="Search!">  
</form>
  </div>
  <div class="column" style="background-color:#cce6ff;">
    <form method="post" action="graduated.php">  
  
  <h4>Who graduated in the last 5 years?</h4><br>
  <input class="btn btn-success" type="submit" name="submit" value="Find out!">  
</form>
  </div>
  
  <div class="column" style="background-color:#e6ffff;">
    <form method="post" action="moreInterests.php">  
  
  <h4>Who has more interests?</h4><br>
  <input class="btn btn-success" type="submit" name="submit" value="Let's see!">  
</form>
  </div>
  
</div>

<br><br>
	</body>
</html> 



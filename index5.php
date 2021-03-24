<?php


session_start();

if(!isset($_SESSION['username'])) { //if not yet logged in
			header("Location: log/login.php");// send to login page
			exit;
			}

$_SESSION['awards'] = $_POST['awards'];

$_SESSION['title_award'] = $_POST['title_award'];

$_SESSION['year_award'] = $_POST['year_award'];

$_SESSION['extra_courses'] = $_POST['extra_courses'];

$_SESSION['year_graduation'] = $_POST['year_graduation'];

$_SESSION['membership_title'] = $_POST['membership_title'];

$_SESSION['membership_description'] = $_POST['membership_description'];

$_SESSION['membership_period'] = $_POST['membership_period'];

?>


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
			include 'header.php';?>
</div>


<h2>Create your XML profiles!</h2>
<style>
p{padding:0;margin:0;font-family:"Times New Roman", serif;
letter-spacing: 1px;background-color:#f1f1f1;margin-bottom:5px;margin-top:5px;}
legend{margin-top:10px;border:1px solid #444;padding:5px;margin-bottom:15px;background-color:#6A5ACD;}
fieldset{width:300px;margin-left:20px;border:1px solid #444;padding:5px;}
body{margin-left:400px;margin-right:400px;background-color:#FFE4C4;}
</style>
<form method="post" action="dom.php">  
  
<legend>Jobs</legend>

   
	  <div class="table-responsive">  
		  
				
				<table class="table table-bordered" id="dynamic_field">  
				 <tr> 
					 <td><button type="button" name="add" id="add_jobs" class="btn btn-success">Add More Jobs</button></td>
					 
				</tr>  
				<tr>  
					 <td><input type="text" name="job_title[]" placeholder="Job title" class="form-control name_list" required/></td>    
					 <td><input type="text" name="job_description[]" placeholder="Job description" class="form-control name_list" required/></td>   
					 <td><input type="text" name="job_period[]" placeholder="Job period" class="form-control name_list" required/></td> 
			    </tr> 
				</table>
				<legend>Interests</legend>
				<table class="table table-bordered" id="dynamic_field2">  	
				<tr>
				<td><button type="button" name="add" id="add_interests" class="btn btn-success">Add Extra Interests</button></td>   
				</tr>
			    <tr>  
					 <td><input type="text" name="interests[]" placeholder="Enter an interest" class="form-control name_list" required/></td>     
			    </tr> 
				</table>  
	  </div> 
  <br><br>
  
  
  <input class="btn btn-success" type="submit" name="submit" value="Finish">  
</form>

</body>
</html>

<script>  

$(document).ready(function(){  
      var i=1;  
      $('#add_jobs').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr><td><input type="text" name="job_title[]" placeholder="Job title" class="form-control name_list" required/></td><td><input type="text" name="job_description[]" placeholder="Job description" class="form-control name_list" required/></td><td><input type="text" name="job_period[]" placeholder="Job period" class="form-control name_list" required/></td></tr>');  
      });   
 });

 $(document).ready(function(){  
      var i=1;  
      $('#add_interests').click(function(){  
           i++;  
           $('#dynamic_field2').append('<tr><td><input type="text" name="interests[]" placeholder="Enter an interest" class="form-control name_list" required/></td></tr>');  
      });   
 }); 
 </script>

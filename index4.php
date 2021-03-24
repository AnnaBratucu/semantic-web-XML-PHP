<?php


session_start();
if(!isset($_SESSION['username'])) { //if not yet logged in
			header("Location: log/login.php");// send to login page
			exit;
			}


$_SESSION['unis'] = $_POST['unis'];

$_SESSION['unis_city'] = $_POST['unis_city'];

$_SESSION['unis_year'] = $_POST['unis_year'];

$_SESSION['unis_subjects'] = $_POST['unis_subjects'];

$_SESSION['unis_subjects_grades'] = $_POST['unis_subjects_grades'];

$_SESSION['unis_subjects_keywords'] = $_POST['unis_subjects_keywords'];

$_SESSION['unis_subjects_years'] = $_POST['unis_subjects_years'];

$_SESSION['unis_subjects_type'] = $_POST['unis_subjects_type'];

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
<form method="post" action="index5.php">  
  
<legend>Informal educational background</legend>

   
	  <div class="table-responsive">  
				
			<table class="table table-bordered" id="dynamic_field2">  
			<tr> 
					 <td><button type="button" name="add" id="add" class="btn btn-success">Add More Awards</button></td>  
					 <td><button type="button" name="add" id="add_courses" class="btn btn-success">Add Extra Courses</button></td>
					 <td><button type="button" name="add" id="add_membership" class="btn btn-success">Add Membership</button></td>
		
					 
				</tr> 
				<tr>  
					 <td><input type="text" name="awards[]" placeholder="Enter your awards" class="form-control name_list" required/></td>  
					 <td><input type="text" name="title_award[]" placeholder="Title award" class="form-control subjects_list" required/></td>  
					 <td><input type="text" name="year_award[]" placeholder="Year of award" class="form-control subjects_list" required/></td>  
			    </tr>
				</table>
			<table class="table table-bordered" id="dynamic_field3">  
			    <tr>
					 <td><input type="text" name="extra_courses[]" placeholder="Enter extra courses studied" class="form-control subjects_list" required/></td>  
					 <td><input type="text" name="year_graduation[]" placeholder="Enter the year of graduation" class="form-control subjects_list" required/></td>  
					</tr>
					</table>
			<table class="table table-bordered" id="dynamic_field4">  
				<tr>  
					 <td><input type="text" name="membership_title[]" placeholder="Membership title" class="form-control name_list" required/></td>  
					 <td><input type="text" name="membership_description[]" placeholder="Membership description" class="form-control subjects_list" required/></td>  
					 <td><input type="text" name="membership_period[]" placeholder="Membership period" class="form-control subjects_list" required/></td>  
			    </tr>
				</table>

				 
				 
		   </table>  
	  </div>  
</fieldset>
  <br><br>
  <input class="btn btn-success" type="submit" name="submit" value="Go to next step">  
</form>


 

</body>
</html>

<script>  
 $(document).ready(function(){  
      var i=1;  
	  $q=500;
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field2').append('<tr><td><input type="text" name="awards[]" placeholder="Enter your awards" class="form-control name_list" required/></td><td><input type="text" name="title_award[]" placeholder="Title award" class="form-control name_list" required/></td><td><input type="text" name="year_award[]" placeholder="Year of award" class="form-control name_list" required/></td>');  
		   
		   $r=$q+200;
	  $('#field').css("height",$r + 'px');
	  $q=$r;
      });  
	   
 });  


$(document).ready(function(){  
      var i=1;  
      $('#add_courses').click(function(){  
           i++;  
           $('#dynamic_field3').append('<tr><td><input type="text" name="extra_courses[]" placeholder="Enter extra courses studied" class="form-control subjects_list" required/></td><td><input type="text" name="year_graduation[]" placeholder="Enter the year of graduation" class="form-control subjects_list" required/></td></tr>');  
      });   
 }); 

$(document).ready(function(){  
      var i=1;  
      $('#add_membership').click(function(){  
           i++;  
           $('#dynamic_field4').append('<tr id="row'+i+'"><td><input type="text" name="membership_title[]" placeholder="Membership title" class="form-control name_list" required/></td><td><input type="text" name="membership_description[]" placeholder="Membership description" class="form-control subjects_list" required/></td><td><input type="text" name="membership_period[]" placeholder="Membership period" class="form-control subjects_list" required/></td></tr>');  
      });   
 }); 
 

 </script>

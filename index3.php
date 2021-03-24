<?php


session_start();
if(!isset($_SESSION['username'])) { //if not yet logged in
			header("Location: log/login.php");// send to login page
			exit;
			}


$_SESSION['name'] = $_POST['name'];

$_SESSION['gender'] = $_POST['gender'];

$_SESSION['website'] = $_POST['website'];

$_SESSION['address'] = $_POST['address'];

$_SESSION['telephone'] = $_POST['telephone'];

//$_SESSION['email'] = $_POST['email'];

$_SESSION['birth'] = $_POST['birth'];

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
body{margin-left:200px;margin-right:200px;background-color:#FFE4C4;}
</style>
<form method="post" action="index4.php">  
  
<legend>Educational background</legend>

   
	  <div class="table-responsive">  
		   <table class="table table-bordered" id="dynamic_field">  
				<tr> 
					 <td><button type="button" name="add" id="add_subjects" class="btn btn-success">Add More Subjects</button></td>  
		
					 <td><button type="button" name="add" id="add" class="btn btn-success">Add More Educational Background</button></td>  
				</tr> 
				<tr>  
					 <td><input type="text" name="unis[]" placeholder="Enter your studied University" class="form-control name_list" required/></td>  
			    </tr>
				<tr>  
					 <td><input type="text" name="unis_city[]" placeholder="City" class="form-control name_list" required/></td>  
			    </tr>
				<tr>  
					 <td><input type="text" name="unis_year[]" placeholder="Graduation Year" class="form-control name_list" required/></td>  
			    </tr>
				<tr>  
				<tr>  
					 <td><input type="text" name="unis_subjects[0][0]" placeholder="Enter studied subjects" class="form-control subjects_list" required/></td>  
					 <td><input type="text" name="unis_subjects_grades[0][0]" placeholder="Enter the subject's final grade" class="form-control subjects_list" required/></td>  
					 <td><input type="text" name="unis_subjects_keywords[0][0]" placeholder="Enter the subject's keyword" class="form-control subjects_list" required/></td>  
					 <td><input type="text" name="unis_subjects_years[0][0]" placeholder="Enter the subject's year" class="form-control subjects_list" required/></td>  
					 
					 <td><select name="unis_subjects_type[0][0]" class="form-control subjects_list" required>
					  <option selected="selected">Select the subject's type</option>
					  <option value="technologic">Technologic</option>
					  <option value="scientific">Scientific</option>
					  <option value="arts">Arts</option>
					  <option value="languages">Languages</option>
					</select></td>
			    </tr>  
			    </tr>
				 
		   </table>  
	  </div>  
</fieldset>
  <br><br>
  <input class="btn btn-success" type="submit" name="submit" value="Go to next step">  
</form>


 



</body>
</html>

<script>  
var i=0; 
var k=0; 
 $(document).ready(function(){  
      
      $('#add').click(function(){  
            i=0;
			k++;
           $('#dynamic_field').append('<tr><td><input type="text" name="unis[]" placeholder="Enter your studied University" class="form-control name_list" required/></td></tr><tr><td><input type="text" name="unis_city[]" placeholder="City" class="form-control name_list" required/></td></tr><tr><td><input type="text" name="unis_year[]" placeholder="Graduation Year" class="form-control name_list" required/></td></tr><td><input type="text" name="unis_subjects['+k+']['+i+']" placeholder="Enter studied subjects" class="form-control subjects_list" required/></td><td><input type="text" name="unis_subjects_grades['+k+']['+i+']" placeholder="Enter the subjects final grade" class="form-control subjects_list" required/></td><td><input type="text" name="unis_subjects_keywords['+k+']['+i+']" placeholder="Enter the subjects keyword" class="form-control subjects_list" required/></td><td><input type="text" name="unis_subjects_years['+k+']['+i+']" placeholder="Enter the subject year" class="form-control subjects_list" required/></td><td><select name="unis_subjects_type['+k+']['+i+']" class="form-control subjects_list" required><option selected="selected">Select the subject type</option><option value="technologic">Technologic</option><option value="scientific">Scientific</option><option value="arts">Arts</option><option value="languages">Languages</option></select></td>');  
		   
      });  
	    
 });  
 

$(document).ready(function(){  
      
      $('#add_subjects').click(function(){  
           i++;
           $('#dynamic_field').append('<tr><td><input type="text" name="unis_subjects['+k+']['+i+']" placeholder="Enter studied subjects" class="form-control subjects_list" required/></td><td><input type="text" name="unis_subjects_grades['+k+']['+i+']" placeholder="Enter the subjects final grade" class="form-control subjects_list" required/></td><td><input type="text" name="unis_subjects_keywords['+k+']['+i+']" placeholder="Enter the subjects keyword" class="form-control subjects_list" required/></td><td><input type="text" name="unis_subjects_years['+k+']['+i+']" placeholder="Enter the subject year" class="form-control subjects_list" required/></td><td><select name="unis_subjects_type['+k+']['+i+']" class="form-control subjects_list" required><option selected="selected">Select the subject type</option><option value="technologic">Technologic</option><option value="scientific">Scientific</option><option value="arts">Arts</option><option value="languages">Languages</option></select></td></tr>');  
		   
      });   
 }); 
 </script>

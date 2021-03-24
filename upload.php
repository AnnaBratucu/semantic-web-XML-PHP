<div class="header">
			<?php  
			include 'head.php'; 
			include 'header.php';?>
</div>
<?php
 
   
   if(isset($_POST['submit'])){
 
 // Count total files
 $countfiles = count($_FILES['file']['name']);

 // Looping all files
 for($i=0;$i<$countfiles;$i++){
  $filename = $_FILES['file']['name'][$i];
 
  // Upload file
  move_uploaded_file($_FILES['file']['tmp_name'][$i],'xml/'.$filename);
  header("location: merge.php");
 
 }
} 




?>
<!DOCTYPE HTML>  
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
</head>
<body>  



<h2>Create your XML profiles!</h2>
<style>
p{padding:0;margin:0;font-family:"Times New Roman", serif;
letter-spacing: 1px;background-color:#f1f1f1;margin-bottom:5px;margin-top:5px;}
legend{margin-top:10px;border:1px solid #444;padding:5px;margin-bottom:15px;background-color:#6A5ACD;}
fieldset{width:300px;margin-left:20px;border:1px solid #444;padding:5px;}
body{margin-left:400px;margin-right:400px;background-color:#FFE4C4;}
</style>
<h4>Upload the XMLs</h4>
	  
	  <form method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' enctype='multipart/form-data'>
 <input type="file" name="file[]" id="file" class="form-control" multiple><br>

 <input type='submit' class="btn btn-success" name='submit' value='Upload'>
</form>



</form>
</body>
</html>
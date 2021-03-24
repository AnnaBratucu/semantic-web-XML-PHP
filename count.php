<div class="header">
			<?php  
			include 'head.php'; 
			include 'header.php';?>
</div>
<?php 


session_start();

if(!isset($_SESSION['username'])) { //if not yet logged in
			header("Location: log/login.php");// send to login page
			exit;
			}

	
	$xml=simplexml_load_file($_SESSION['username'] . '_infoall_list.xml');
	
	echo '<br><br>';
	$result = $xml->xpath('/Persons/Person/Education/FormStudy/Subjects/Subject[SubjectType/text()="technologic"]');
	echo '<div style="font-size:20px;"><b>Number of technologic related subjects: ' . count($result) . '</b></div>';
	
	
	
	
	
	
	

	
 ?>
 <!DOCTYPE HTML>  
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
</head>
<body>  


<style>
p{padding:0;margin:0;font-family:"Times New Roman", serif;
letter-spacing: 1px;background-color:#f1f1f1;margin-bottom:5px;margin-top:5px;}
legend{margin-top:10px;border:1px solid #444;padding:5px;margin-bottom:15px;background-color:#6A5ACD;}
fieldset{width:300px;margin-left:20px;border:1px solid #444;padding:5px;}
body{margin-left:400px;margin-right:400px;background-color:#FFE4C4;}
</style>


</body>
</html>
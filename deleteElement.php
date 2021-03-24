<!DOCTYPE html>
<html>
 <head>
<?php
	include 'head.php'; 
	include 'header.php';
	require_once('settings.php');
	require_once('google-login-api.php');
	require_once "config.php";
	session_start();
	if(!isset($_SESSION['username'])) { //if not yet logged in
			header("Location: log/login.php");// send to login page
			exit;
			}?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
	<style>
p{padding:0;margin:0;font-family:"Times New Roman", serif;
letter-spacing: 1px;background-color:#f1f1f1;margin-bottom:5px;margin-top:5px;}
legend{margin-top:10px;border:1px solid #444;padding:5px;margin-bottom:15px;background-color:#6A5ACD;}
fieldset{width:300px;margin-left:20px;border:1px solid #444;padding:5px;}
body{margin-left:400px;margin-right:400px;background-color:#FFE4C4;}
</style>
</head>
 <body>
 <div class="header">
			<?php include 'header.php'; ?>
		
			
		</div>
		<br><br>
<?php
	
if (isset($_REQUEST['ok'])) {
 $xml = new DOMDocument("1.0","UTF-8");
 $xml->preserveWhiteSpace = false;
$xml->formatOutput = true;
 $xml->load($_SESSION['username'] . '_infoall_list.xml');

 $a = $_REQUEST['a'];
 $xpath = new DOMXPATH($xml);
 foreach ($xpath->query("/Persons/Person/Jobs/Job[Title = '$a' ]") as $node) {
 	$node->parentNode->removeChild($node);
 }
 $xml->formatoutput = true;
 $xml->save($_SESSION['username'] . '_infoall_list.xml');
}
?>
<h2>Delete a job from your resume</h2><br>

<?php $xml=simplexml_load_file($_SESSION['username'] . '_infoall_list.xml');
				$result0 = $xml->xpath('/Persons/Person/Jobs/Job');
				
				if(count($result0) != 0){
				foreach($result0 as $p){
					echo 'Job: <b>' . $p->Title . '</b> with job description: <b>' . $p->JobDescription . '</b> and period: <b>' . $p->JobPeriod . '</b> <br>';
				}
				
				}
?>
<br><br>
<form action="deleteElement.php" method="post" style="width:400px;">
 <input type="text" name="a" class="form-control" placeholder="Job's title"> <br>
 <input type="submit" class="btn btn-success" name="ok">
</form>

<br><br>
 </body>
</html>
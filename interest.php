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
	$c=0;

	
	$array=  [];
	$i=0;
	try { 
    $pdo = new PDO("mysql:host = localhost; 
                      dbname=plan", "root", ""); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE,  
                        PDO::ERRMODE_EXCEPTION); 
} 
catch (PDOException $e) { 
    die("ERROR: Could not connect. ".$e->getMessage()); 
} 
try { 
    $sql = "SELECT * FROM users"; 
    $res = $pdo->query($sql); 
    if ($res->rowCount() > 0) { 
        while ($row = $res->fetch()) { 
            $array[$i] = $row['user_email'];
			$i++;
        } 
        unset($res); 
    } 
    else { 
        echo "No matching records are found."; 
    } 
} 
catch (PDOException $e) { 
    die("ERROR: Could not able to execute $sql. " 
                                .$e->getMessage()); 
} 
unset($pdo); 
	foreach($array as $u){
				$xml=simplexml_load_file($u . '_infoall_list.xml');
				$result0 = $xml->xpath('/Persons/Person/Name');
				$result = $xml->xpath('/Persons/Person/Interests[Interest/text()="programming"]');
				$result1 = $xml->xpath('/Persons/Person/InformalEducation/Course[YearGraduation/text()>2016 and YearGraduation/text()<2020]');
				//$result2 = $result1->xpath('/Persons/Person/InformalEducation/Course/Name');
				if(count($result) != 0){
				foreach($result1 as $p){
					echo 'Extra-courses graduated by ' . $result0[0] . ' in the last 3 years: ' . $p->Name . ' in ' . $p->YearGraduation . ' <br>';
				}
				//}
				//if(count($result) != 0){
					$c++;
				}
			}
			echo '<div style="font-size:20px;"><b>Number of programming passionate users: ' . $c . '</b></div>';
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
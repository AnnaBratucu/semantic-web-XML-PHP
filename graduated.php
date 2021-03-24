<div class="header">
			<?php  
			include 'head.php'; 
			include 'header.php';?>
</div>
<?php
    
       
			chdir('C:\Users\ANA\Desktop\SW\project2');
			$file = 'graduated.rq';
			// Open the file to get existing content
			$current = file_get_contents($file);
			// Append a new person to the file
			$output1 = "PREFIX friends: <http://www.w3.org/2000/01/rdf-schema#>
						PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
						SELECT ?name ?graduated
						WHERE {


						?x  friends:gradYear  ?graduated . ?x  friends:name  ?name .
						FILTER (xsd:integer(?graduated) >= xsd:integer(2013))

						}";
			$current = $output1;
			// Write the contents back to the file
			file_put_contents($file, $current);
			echo "<br><br>";
			echo "<h2>How many people graduated in the last 5 (or 6) years?</h2>";
			echo "<br><br>";
			chdir('C:\Users\ANA\Desktop\apache-jena-3.13.1');
			$out = "<pre style='width:600px'>" . htmlspecialchars(shell_exec( 'bat\sparql.bat --data=../SW/project2/project2.rdf --query=../SW/project2/graduated.rq' ))."</pre>";
			echo $out;
			//echo shell_exec( 'bat\sparql.bat --data=../SW/project2/project2.rdf --query=../SW/project2/test1.rq' );
			//echo shell_exec( 'dir' );
			
		
        
   
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
	  
	 



</form>
</body>
</html>
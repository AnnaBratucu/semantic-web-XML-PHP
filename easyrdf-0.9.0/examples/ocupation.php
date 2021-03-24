<div class="header">
			<?php  
			include '../../head.php'; 
			include '../../header.php';?>
</div>
<?php
    /**
     * Convert RDF from one format to another
     *
     * The source RDF data can either be fetched from the web
     * or typed into the Input box.
     *
     * The first thing that this script does is make a list the names of the
     * supported input and output formats. These options are then
     * displayed on the HTML form.
     *
     * The input data is loaded or parsed into an EasyRdf_Graph.
     * That graph is than outputted again in the desired output format.
     *
     * @package    EasyRdf
     * @copyright  Copyright (c) 2009-2013 Nicholas J Humfrey
     * @license    http://unlicense.org/
     */

    set_include_path(get_include_path() . PATH_SEPARATOR . '../lib/');
    require_once "EasyRdf.php";
    require_once "html_tag_helpers.php";
	
    $input_format_options = array('Guess' => 'guess');
    $output_format_options = array();
    foreach (EasyRdf_Format::getFormats() as $format) {
        if ($format->getSerialiserClass()) {
            $output_format_options[$format->getLabel()] = $format->getName();
        }
        if ($format->getParserClass()) {
            $input_format_options[$format->getLabel()] = $format->getName();
        }
    }

    // Stupid PHP :(
    if (get_magic_quotes_gpc() and isset($_REQUEST['data'])) {
        $_REQUEST['data'] = stripslashes($_REQUEST['data']);
    }

    // Default to Guess input and Turtle output
    if (!isset($_REQUEST['output_format'])) {
        $_REQUEST['output_format'] = 'turtle';
    }
    if (!isset($_REQUEST['input_format'])) {
        $_REQUEST['input_format'] = 'guess';
    }

    // Display the form, if raw option isn't set
    if (!isset($_REQUEST['raw'])) {
		$myfile = fopen("../../rdf/project2.rdf", "r") or die("Unable to open file!");

        print "<html>\n";
        print "<head><title>Search by ocupation</title></head>\n";
        print "<body>\n";
        print "<h1>Search by ocupation</h1>\n";
		
        print "<div style='margin: 10px'>\n";
        print form_tag();
		print label_tag('ocupation', 'Ocupation: ').text_field_tag('ocupation', '', array('size'=>40)) . "<br><br/>\n";
        print label_tag('data', 'Input Data: ').'<br />'.text_area_tag('data', fread($myfile,filesize("../../rdf/project2.rdf")), array('cols'=>80, 'rows'=>10)) . "<br />\n";
        print label_tag('uri', 'or Uri: ').text_field_tag('uri', 'http://www.dajobe.org/foaf.rdf', array('size'=>80)) . "<br />\n";
        print label_tag('input_format', 'Input Format: ').select_tag('input_format', $input_format_options) . "<br />\n";
        print label_tag('output_format', 'Output Format: ').select_tag('output_format', $output_format_options) . "<br />\n";
       // print label_tag('raw', 'Raw Output: ').check_box_tag('raw') . "<br />\n";
        print reset_tag() . submit_tag();
        print form_end_tag();
        print "</div>\n";
		fclose($myfile);
    }

    if (isset($_REQUEST['uri']) or isset($_REQUEST['data'])) {
        // Parse the input
        $graph = new EasyRdf_Graph($_REQUEST['uri']);
        if (empty($_REQUEST['data'])) {
            $graph->load($_REQUEST['uri'], $_REQUEST['input_format']);
        } else {
            $graph->parse($_REQUEST['data'], $_REQUEST['input_format'], $_REQUEST['uri']);
        }

        // Lookup the output format
        $format = EasyRdf_Format::getFormat($_REQUEST['output_format']);

        // Serialise to the new output format
        $output = $graph->serialise($format);
        if (!is_scalar($output)) {
            $output = var_export($output, true);
        }

        // Send the output back to the client
        if (isset($_REQUEST['raw'])) {
            header('Content-Type: '.$format->getDefaultMimeType());
            print $output;
        } else {
			chdir('C:\Users\ANA\Desktop\SW\project2');
			$file = 'test.rq';
			// Open the file to get existing content
			$current = file_get_contents($file);
			// Append a new person to the file
			$output1 = "PREFIX friends: <http://www.w3.org/2000/01/rdf-schema#>
						SELECT ?x ?ocupation ?a
						WHERE {


						{?x  friends:ocupation  ?ocupation }
						UNION
						{ ?x  friends:ocupation  ?ocupation . ?ocupation friends:name ?a } .
						FILTER ( regex(?a, '" . $_REQUEST['ocupation'] . "', 'i') || regex(?ocupation, '" . $_REQUEST['ocupation'] . "', 'i') )

						}";
			$current = $output1;
			// Write the contents back to the file
			file_put_contents($file, $current);
			
			chdir('C:\Users\ANA\Desktop\apache-jena-3.13.1');
			$out = "<pre style='width:1000px'>" . htmlspecialchars(shell_exec( 'bat\sparql.bat --data=../SW/project2/project2.rdf --query=../SW/project2/test.rq' ))."</pre>";
			echo $out;
			//echo shell_exec( 'bat\sparql.bat --data=../SW/project2/project2.rdf --query=../SW/project2/test1.rq' );
			//echo shell_exec( 'dir' );
			
			print '<img src="../../rdf/rdf_graph_ocupation.png" alt="RDF Graph" height="1000" width="3200">';
            //print '<pre>'.htmlspecialchars($output).'</pre>';
			chdir('C:\Users\ANA\Desktop\SW\project2');
			$file = 'rdf_ocupation.dot';
			// Open the file to get existing content
			$current = file_get_contents($file);
			// Append a new person to the file
			$output = htmlspecialchars_decode($output);
			if( strpos($out, "friends#ana") ) $output = str_replace('[label="Ana Enache",shape=record]', '[label="Ana Enache",style=filled,fillcolor=green,shape=record]', $output);
			if( strpos($out, "friends#vlad") ) $output = str_replace('[label="Vlad Ionescu",shape=record]', '[label="Vlad Ionescu",style=filled,fillcolor=green,shape=record]', $output);
			if( strpos($out, "friends#ion") ) $output = str_replace('[label="Ion Popescu",shape=record]', '[label="Ion Popescu",style=filled,fillcolor=green,shape=record]', $output);
			if( strpos($out, "friends#mara") ) $output = str_replace('[label="Mara Iordache",shape=record]', '[label="Mara Iordache",style=filled,fillcolor=green,shape=record]', $output);
			$current = $output;
			// Write the contents back to the file
			file_put_contents($file, $current);
			//$a = shell_exec( "chmod 777 C:\Users\ANA\Desktop\Graphviz2.38\bin -R; cd C:\Users\ANA\Desktop\Graphviz2.38\bin; ls -la ." );
			chdir('C:\Users\ANA\Desktop\Graphviz2.38\bin');
			exec( 'dot -Tpng C:\Users\ANA\Desktop\SW\project2\rdf_ocupation.dot -o D:\xamp\htdocs\SWproject1_BratucuAna_MateiCristina_1241\rdf\rdf_graph_ocupation.png' );
			
        }
    }

    if (!isset($_REQUEST['raw'])) {
        print "</body>\n";
        print "</html>\n";
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
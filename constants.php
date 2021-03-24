<?php
// ----------------------------------------------------------------------------------
// GRAPHVIZ
// ----------------------------------------------------------------------------------

// path to the dot binary
define('GRAPHVIZ_PATH', 'D:\xamp\htdocs\SWproject1_BratucuAna_MateiCristina_1241\Graphviz2.38\bin\dot.exe');

// directory for temporary files
// Attention: must be write-/readable by the webserver
define('GRAPHVIZ_TEMP', 'C:\/');

// display statistical data in generated images
// currently only number of statements drawn
define('GRAPHVIZ_STAT', TRUE);

// allowed file formats
// for security reasons (to prevent code injection)
define('GRAPHVIZ_FORMAT', 'svg, dot, jpg, png, gif, vrml');

// enable clickable URIs
// only supported by certain formats (e.g. SVG)
define('GRAPHVIZ_URI', FALSE);

// define parameters for the graphical output
// if a paramter is undefined, the default value of graphviz is used
// for further information see: http://www.graphviz.org/Documentation.php
$graphviz_param = array(
   GRAPH_STYLE     => 'rankdir="LR"',
   RESOURCE_STYLE  => 'style="filled",color="#FFD800",fontname="Courier",fontsize="10"',
   LITERAL_STYLE   => 'shape="box",style="filled",color="#B7FFAF",fontname="Courier",fontsize="10"',
   PREDICATE_STYLE => 'fontname="Courier",fontsize="10"',
   INFERRED_STYLE  => 'style="dotted",fontname="Courier",fontsize="10"',
   BLANKNODE_STYLE => 'style="filled",color="#DDDDDD",fontname="Courier",fontsize="10"',
   BOX_STYLE       => 'fontname="Courier",fontsize="8",color="#BBBBBB"'
);
?>
<?php
set_include_path(get_include_path() . PATH_SEPARATOR . '../lib/');
require_once "EasyRdf.php";

$endpoint = new EasyRdf_Sparql_Client('http://localhost/SWproject1_BratucuAna_MateiCristina_1241/rdf/query',
                                      'http://localhost/SWproject1_BratucuAna_MateiCristina_1241/rdf/update');

function insert_data() {
    global $endpoint;
    $result = $endpoint->update("
        PREFIX : <http://localhost/SWproject1_BratucuAna_MateiCristina_1241/rdf/project2.rdf> 
        INSERT DATA {:vlad :job 'Anywhere'}"
    );
}
function insert_where() {
    global $endpoint;
    $result = $endpoint->update ("
        PREFIX : <http://localhost/SWproject1_BratucuAna_MateiCristina_1241/rdf/project2.rdf> 
        INSERT {?s :job ?o}
        WHERE {?s :name 'Vlad Ionescu'. ?o :name 'Anywhere'}"
    );
}
function select_where() {
    global $endpoint;
    $result = $endpoint->query("
        SELECT * WHERE {?s ?p ?o}"
    );
    print ($result->numRows()); 
}

insert_data();   
select_where();
insert_where();  
select_where();

?>
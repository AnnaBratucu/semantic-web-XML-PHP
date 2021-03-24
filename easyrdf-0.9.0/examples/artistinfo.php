<?php
    /**
     * Mapping an RDF class type to a PHP Class
     *
     * This example fetches and displays artist information from the
     * BBC Music website. The artist object is an instance of the
     * Model_MusicArtist class, so it is possible to call custom PHP
     * methods on the object.
     *
     * It also demonstrates setting new namespaces.
     *
     * @package    EasyRdf
     * @copyright  Copyright (c) 2009-2013 Nicholas J Humfrey
     * @license    http://unlicense.org/
     */

    set_include_path(get_include_path() . PATH_SEPARATOR . '../lib/');
    require_once "EasyRdf.php";
    require_once "html_tag_helpers.php";


    class Model_MusicArtist extends EasyRdf_Resource
    {
        function birthEvent()
        {
            foreach ($this->all('bio:event') as $event) {
                if (in_array('bio:Birth', $event->types())) {
                    return $event;
                }
            }
            return null;
        }

        function age()
        {
            $birth = $this->birthEvent();
            if ($birth) {
                $year = substr($birth->get('bio:date'), 0, 4);
                if ($year) {
                    return date('Y') - $year;
                }
            }
            return 'unknown';
        }
    }

    ## Add namespaces
    EasyRdf_Namespace::set('mo', 'http://purl.org/ontology/mo/');
    EasyRdf_Namespace::set('bio', 'http://purl.org/vocab/bio/0.1/');
    EasyRdf_TypeMapper::set('mo:MusicArtist', 'Model_MusicArtist');
?>
<html>
<head><title>EasyRdf Artist Info Example</title></head>
<body>
<h1>EasyRdf Artist Info Example</h1>

<?= form_tag() ?>
<?= text_field_tag('uri', 'http://localhost/SWproject1_BratucuAna_MateiCristina_1241/rdf/project2.rdf', array('size'=>50)) ?>
<?= submit_tag() ?>
<?= form_end_tag() ?>

<?= form_tag(null, array('method' => 'POST')) ?>
<?= labeled_text_field_tag('email', 'joe@example.com') ?><br />
<?= submit_tag() ?>
<dl>

<?php
    if (isset($_REQUEST['uri'])) {
        $graph = EasyRdf_Graph::newAndLoad($_REQUEST['uri']);
        $artist = $graph->primaryTopic();
    }
	
	/*$me = $graph->resource($_REQUEST['uri'], 'rdf:Person');
       // $me->set('foaf:name', $_REQUEST['title'].' '.$_REQUEST['given_name'].' '.$_REQUEST['family_name']);
        if ($_REQUEST['email']) {
            $homepage = $graph->resource($_REQUEST['email']);
            $me->add('rdfs:email', $homepage);
        }
		
		 $data = $graph->serialise($_REQUEST['format']);
        if (!is_scalar($data)) {
            $data = var_export($data, true);
        }
        print "<pre>".htmlspecialchars($data)."</pre>";*/

    if (isset($artist)) {
?>

    <dt>Artist Name:</dt><dd><?= $artist->get('foaf:name') ?></dd>
    <dt>Type:</dt><dd><?= join(', ', $artist->types()) ?></dd>
    <dt>Homepage:</dt><dd><?= link_to($artist->get('foaf:homepage')) ?></dd>
    <dt>Wikipedia page:</dt><dd><?= link_to($artist->get('mo:wikipedia')) ?></dd>
    <?php
        if ($artist->isA('mo:SoloMusicArtist')) {
            echo "  <dt>Age:</dt>";
            echo "  <dd>".$artist->age()."</dd>\n";
        }
    ?>
</dl>
<?php
    }

    if (isset($graph)) {
        echo $graph->dump();
    }
?>
</body>
</html>

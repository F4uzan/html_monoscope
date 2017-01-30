<?php
/**
 * function xml2array
 *
 * This function is part of the PHP manual.
 *
 * The PHP manual text and comments are covered by the Creative Commons 
 * Attribution 3.0 License, copyright (c) the PHP Documentation Group
 *
 * @author  k dot antczak at livedata dot pl
 * @date    2011-04-22 06:08 UTC
 * @link    http://www.php.net/manual/en/ref.simplexml.php#103617
 * @license http://www.php.net/license/index.php#doc-lic
 * @license http://creativecommons.org/licenses/by/3.0/
 * @license CC-BY-3.0 <http://spdx.org/licenses/CC-BY-3.0>
 */
function xml2array ( $xmlObject, $out = array () ) {
    foreach ( (array) $xmlObject as $index => $node )
        $out[$index] = ( is_object ( $node ) ) ? xml2array ( $node ) : $node;

    return $out;
}

	$txt = urlencode($_GET['search']);
	$engine = $_GET['engine'];
	
	$plugin_dir = glob('plugins/*.xml');
					
		if (is_array($plugin_dir)) {
			foreach($plugin_dir as $filename) {
			$raw_plugin = simplexml_load_file($filename) or die("Cannot create object");
			$plugin_load = xml2array($raw_plugin);
							
			$id = $plugin_load['id'];
			$icon = $plugin_load['icon'];
			$icon_format = $plugin_load['icon_format'];
			$search_uri = $plugin_load['search_uri'];
			
			if ($engine == $id) {
				header("location: $search_uri$txt");
			}
		}
	}
?>
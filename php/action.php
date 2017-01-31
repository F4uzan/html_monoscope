<?php
include 'common.php';
	$txt = urlencode($_GET['search']);
	$engine = $_GET['engine'];
	
	$plugin_dir = glob('../plugins/*.xml');
					
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
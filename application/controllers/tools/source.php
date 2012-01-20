<?php

# Basic source code displayer.

class Page
{

	function __construct()
	{
		Load::library('view');

		echo View::show('header', array(
			'title' => 'Nimja.com - UltraLight Source Example',
			'base_url' => $GLOBALS['config']['base_url']
		));
		echo '<a href="/" class="button">Back to the index.</a>';

		#Controllers that can be viewed. key = source/*, value = controller.
		$sources = array(
			'index' => 'index',
			'errors' => 'errors',
			'source' => 'tools/source',
		);

		foreach ($sources as $key => $value) {
			echo '<a href="/source/' . $key . '" class="button">Source of the ' . $key . ' controller</a>';
		}
		echo '<div class="clear"></div>';

		$url = Load::$rest;

		$file = !empty($sources[$url]) ? $sources[$url] : $sources['source'];

		$file = PATH_CONTROLLERS . $file . '.php';

		#Get highlighted contents
		$src = highlight_file($file, TRUE);

		#And show!
		echo $src;

		echo View::show('footer');
	}

}
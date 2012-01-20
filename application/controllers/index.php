<?php

/**
 * 
 */
class Page
{

	function __construct()
	{
		Load::library('view,format');

		echo View::show('header', array(
			'title' => 'Nimja.com - UltraLight Example',
			'base_url' => $GLOBALS['config']['base_url']
		));
		echo Format::parse('This is a small example page for UltraLight.');

		$pages = array(
			'errors?value=Do+anything+here.' => "Example of development error messages.",
			'source/index' => "Source of this file."
		);
		foreach ($pages as $link => $text) {
			echo '<a class="button" href="' . $link . '">' . $text . '</a>';
		}
		echo '<div class="clear"></div>';

		$features = Load::getFeatures();
		echo Format::parse($features);

		echo View::show('footer');
	}

}
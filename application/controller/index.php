<?php

/**
 * 
 */
class Page
{

	function __construct()
	{
		echo Library_View::show('header', array(
			'title' => 'Nimja.com - UltraLight Example',
			'base_url' => $GLOBALS['config']['base_url']
		));
		echo Library_Format::parse('This is a small example page for UltraLight.');

		$pages = array(
			'errors?value=Do+anything+here.' => "Example of development error messages.",
			'source/index' => "Source of this file."
		);
		foreach ($pages as $link => $text) {
			echo '<a class="button" href="' . $link . '">' . $text . '</a>';
		}
		echo '<div class="clear"></div>';

		$features = '
UltraLight Core v 0.2
* Redirects and forced URLs with some sanity checking. (so /this/page/here is never /////this//page////here )
* Dynamic selection of core or application path for libraries. (core has precedence)

UltraLight Core v 0.1
* VERY light MVC framework, loading 5 slim files for a basic page: index, config, load, controller and view.
* Static access to important methods.
* Dynamic loading of libraries
        ';
		echo Library_Format::parse($features);

		echo Library_View::show('footer');
	}

}
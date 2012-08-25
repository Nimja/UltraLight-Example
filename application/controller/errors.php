<?php
/**
 * Basic show errors page.
 */
class Page
{

	function __construct()
	{
		echo Library_View::show('header', array(
			'title' => 'Nimja.com - UltraLight Errors Example',
			'base_url' => $GLOBALS['config']['base_url']
		));
		echo '<a href="/" class="button">Back to the index.</a>';
		echo '<div class="clear"></div>';

		$test = array(
			'This is an example',
			array(1, 2, 3, 4, 5, 6, 7, 8),
			"<a href=''></a>",
			'Donec a felis felis, a pulvinar eros. Cras vel tincidunt risus. Duis non sapien quis leo iaculis vestibulum a non massa. Vestibulum congue dui ac libero hendrerit eget aliquam lectus pellentesque. Nunc sit amet mi nibh, vel fringilla justo. Donec sollicitudin quam eget odio mollis eget aliquet est vulputate. Curabitur ultricies accumsan libero, vitae ornare quam ullamcorper a. Pellentesque convallis euismod ipsum sed euismod. Sed commodo mollis sapien, vitae pulvinar mi vehicula vel. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
			'Unescaped GET' => $_GET,
		);

		Show::info($test, 'This is an export of test');

		Show::error('This is an error, something went wrong.', 'Some error.');

		Show::info('Custom outside background color', 'Some message', 'green');

        Load::show('test');
        
		Show::fatal('This is a fatal error.');
		
		echo 'This will not be shown.';
	}

}
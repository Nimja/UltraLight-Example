<?php
namespace App\Controller;
/**
 * Page displaying the various error messages.
 *
 * note: This page breaks some code design principles on purpose.
 */
class Errors extends Index
{

    protected function _run()
    {
        echo $this->_output('Error Example', $this->_show('page/errors', null, true));
        $array = array(true, 1, "String", 'last' => null);
        $obj = new \stdClass();
        $obj->boolean = true;
        $obj->integer = 1;
        $obj->string = "String";
        $obj->null = null;
		$test = array(
			'This is an example',
			$array,
            $obj,
			"<a href=''></a>",
			'alert("Test!");',
			'Unescaped GET' => $_GET,
			'Sanitized GET' => \Sanitize::clean($_GET),
		);
		\Show::debug($test);
        \Show::info('Info message example.');
        \Show::error('Error message example.');
		\Show::info('Message with custom color/title', 'Custom Title', '#00FF00');
        Example_Of_Non_Existent_Class::test();
    }
}
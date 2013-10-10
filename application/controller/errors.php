<?php
/**
 * Page displaying the various error messages.
 *
 * note: This page breaks some code design principles on purpose.
 */
class Page extends Controller_Abstract
{

    protected function _run()
    {
        $buttons = array(
            '' => 'Back to index',
            'testajax' => "AJAX example",
            'source/controller/ajax' => 'View source',
            'wrong' => 'Bad controller',
        );
        echo $this->_show(
            'page',
            array(
                'title' => 'Nimja.com - UltraLight Errors Example',
                'buttons' => new Library_Buttons($buttons),
                'content' => Library_Format::parse($this->_show('page/errors')),
            )
        );
        $array = array(true, 1, "String", 'last' => null);
        $obj = new stdClass();
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
		);
		Show::debug($test);
        Show::info('Info message example.');
        Show::error('Error message example.');
		Show::info('Message with custom color/title', 'Custom Title', '#00FF00');
        Example_Of_Non_Existent_Class::test();
    }
}
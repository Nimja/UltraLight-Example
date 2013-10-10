<?php
/**
 * Simple index page, with some buttons for show.
 */
class Page extends Controller_Abstract
{
    protected function _run()
    {
        $debug = Request::value('debug');
        Core::$debug = !empty($debug);
        $buttons = array(
            'errors?value=From+Index' => "Error message examples",
            'testajax' => "AJAX example",
			'source/controller/index' => "View source",
			'?debug=true' => "View debug info"
        );
        return $this->_show(
            'page',
            array(
                'content' => Library_Format::parse($this->_show('page/features')),
                'title' => 'UltraLight - Example Project',
                'buttons' => new Library_Buttons($buttons),
            )
        );
    }
}
<?php
/**
 * Simple index page, with some buttons for show.
 */
class Page extends Controller_Abstract
{
    protected function _run()
    {
        $buttons = array(
            '' => 'Back to index',
            'errors?value=From+Ajax' => "Error message examples",
			'source/controller/ajax' => "View source"
        );
        return $this->_show(
            'page',
            array(
                'content' => $this->_show('page/ajax'),
                'title' => 'UltraLight - Ajax example',
                'buttons' => new Library_Buttons($buttons),
            )
        );
    }
}
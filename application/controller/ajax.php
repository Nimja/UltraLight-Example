<?php
namespace App\Controller;
/**
 * Simple index page, with some buttons for show.
 */
class Ajax extends \App\Controller\Index
{
    protected function _run()
    {
        return $this->_show(
            'page',
            array(
                'content' => $this->_show('page/ajax'),
                'title' => 'UltraLight - Ajax example',
                'buttons' => $this->_getButtons()
            )
        );
    }
}
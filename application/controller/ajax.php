<?php
namespace App\Controller;
/**
 * Simple index page, with some buttons for show.
 */
class Ajax extends \App\Controller\Index
{
    protected function _run()
    {
        return $this->_output('Ajax Example', $this->_show('page/ajax'));
    }
}
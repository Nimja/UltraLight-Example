<?php
namespace App\Controller;
/**
 * Simple index page, with some buttons for show.
 *
 * See the source of ajax/example and ajax/error for the actual ajax actions.
 */
class Ajax extends \App\Controller\Index
{
    protected function _run()
    {
        return $this->_output('Ajax Example', $this->_show('page/ajax'));
    }
}
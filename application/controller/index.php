<?php
namespace App\Controller;
/**
 * By exception we allow this to be present.
 */
\Core::$debug = (\Request::value('debug') || \Config::system()->get('system', 'debug', false));
/**
 * Simple index page, with some buttons for show.
 */
class Index extends \Core\Controller
{

    protected function _run()
    {
        return $this->_show(
            'page',
            array(
                'content' => $this->_show('page/features', array('transform' => 'example|transform|text'), true),
                'title' => 'UltraLight - Example Project',
                'buttons' => $this->_getButtons()
            )
        );
    }

    /**
     *
     * @return \App\Library\Buttons
     */
    protected function _getButtons()
    {
        $url = \Core::$url ? : 'index';
        $buttons = array(
            '' => 'Home',
            'form' => "Form Example",
            'ajax' => "AJAX example",
            'errors?value=From+' . ucfirst($url) => "Error example",
            'source/controller/' . $url => "View source",
            $url . '?debug=true' => "View debug info"
        );
        return new \App\Library\Buttons($buttons);
    }
}
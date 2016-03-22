<?php namespace App\Controller;
/**
 * This is an anti-pattern, but for the demo we allow it.
 */
\Core::$debug = (\Request::value('debug') || \Config::system()->get('system', 'debug', false));
/**
 * Simple index page, with some buttons for show.
 */
class Index extends \Core\Controller
{
    /**
     * All menu buttons for this controller.
     * @var array
     */
    protected $_buttons = [
        'Home' => '/',
        'Examples' => [
            'Form Example' => '/form',
            'Color Example' => '/color',
            'AJAX example' => '/ajax',
            'Error example' => '/errors',
            'Wrong page' => '/wrong',
        ],
        'View source' => 'source/controller/$url',
        'Debug' => '/$url?debug=true'
    ];

    protected function _run()
    {
        if (\Core::$rest) {
            return $this->_showError(\Request::STATUS_ERROR_NOT_FOUND, 'error');
        }
        \Core\View::registerTransformer('custom', '\App\Library\Transform\Custom');
        return $this->_output(
            'Features',
            $this->_show(
                'page/features',
                ['transform' => 'example|transform|text', 'value' => rand(0, 1000)],
                true
            )
        );
    }

    /**
     * Create page output.
     * @param string $title
     * @param string $content
     * @return string
     */
    protected function _output($title, $content)
    {
        $buttons = $this->_getButtons($this->_buttons);
        return $this->_show('page',
            [
                'title' => 'UltraLight Showcase',
                'page' => $title,
                'menu' => new \Core\Bootstrap\Navbar(
                    'UltraLight',
                    $buttons,
                    \Core::$url,
                    'navbar-inverse navbar-fixed-top'
                ),
                'content' => $content
            ]
        );
    }

    /**
     * This would normally not be needed, but we have dynamic buttons for the current page.
     *
     * This replaces all instances of $url with the current url. Used for the Debug and Source buttons.
     *
     * @return array
     */
    private function _getButtons($buttons)
    {
        $result = [];
        $url = \Core::$url;
        foreach ($buttons as $key => $value) {
            $result[$key] = !is_array($value) ? str_replace('$url', $url, $value) : $this->_getButtons($value);
        }
        return $result;
    }
}
<?php
/**
 * Simple index page, with some buttons for show.
 */
class Page extends Controller_Abstract
{
    const TYPE_CONTROLLER = 'controller';
    const TYPE_LIBRARY = 'library';
    const TYPE_VIEW = 'view';
    const REDIRECT_TARGET = '/source/controller/index';
    /**
     * Configuration list for the source viewing.
     * @var array
     */
    private $_config = array(
        self::TYPE_CONTROLLER => array(
            'fileBase' => 'controller/',
            'extension' => 'php',
            'files' => array(
                'index',
                'errors',
                'wrong',
                'testajax',
                'ajax/example',
                'tools/source',
            )
        ),
        self::TYPE_LIBRARY => array(
            'fileBase' => 'library/',
            'extension' => 'php',
            'files' => array(
                'buttons',
            )
        ),
        self::TYPE_VIEW => array(
            'fileBase' => 'view/page/',
            'extension' => 'html',
            'files' => array(
                'ajax',
                'errors',
                'features',
            )
        ),
    );

    /**
     * Current type.
     * @var string
     */
    private $_type;
    /**
     * Current files.
     * @var string
     */
    private $_file;
    /**
     * Show the page.
     * @return string
     */
    protected function _run()
    {
        $buttons = array(
            '' => 'Back to Index',
        );
        $parts = explode('/', Core::$rest);
        $this->_type = array_shift($parts);
        $this->_file = implode('/', $parts);
        if (!isset($this->_config[$this->_type])) {
            Core::redirect(self::REDIRECT_TARGET);
        }
        $config = $this->_config[$this->_type];
        if (!in_array($this->_file, $config['files'])) {
            Core::redirect('/source/controller/index');
        }
        if ($this->_type == self::TYPE_CONTROLLER) {
            $buttons[$this->_file] = 'View normal';
        }
        $fileName = PATH_APP . "{$config['fileBase']}{$this->_file}.{$config['extension']}";
        return $this->_show(
                'page',
                array(
                'content' => $this->_createList() . highlight_file($fileName, true),
                'title' => "Source for $this->_file",
                'buttons' => new Library_Buttons($buttons),
                )
        );
    }

    /**
     * Create list of all sources.
     * @return string
     */
    private function _createList()
    {
        $result = array();
        foreach ($this->_config as $name => $section) {
            $result[] = $this->_createSection($name, $section);
        }
        return implode(PHP_EOL, $result) . '<div class="clear"></div>';
    }

    /**
     * Create section for list.
     * @param string $name
     * @param array $section
     * @return string
     */
    private function _createSection($name, $section)
    {
        $highLight = $name == $this->_type;
        $result = "<div class=\"section\"><h3>$name</h3><ul>";
        foreach ($section['files'] as $file) {
            $curLight = $highLight && $file == $this->_file;
            $link = "/source/$name/$file";
            $class = $curLight ? 'class="current"' : '';
            $result .= "<li $class><a href=\"$link\">$file</a>";
        }
        $result .= '</ul></div>';
        return $result;
    }
}
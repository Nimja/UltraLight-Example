<?php namespace App\Controller\Tools;
/**
 * Simple index page, with some buttons for show.
 */
class Source extends \App\Controller\Index
{
    const TYPE_CONTROLLER = 'controller';
    const TYPE_VIEW = 'view';
    const REDIRECT_TARGET = '/source/controller';
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
                'form',
                'wrong',
                'ajax',
                'ajax/example',
                'tools/source',
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
     * Current file.
     * @var string
     */
    private $_file;

    /**
     * Show the page.
     * @return string
     */
    protected function _run()
    {
        $config = $this->_getConfig();
        $fileName = PATH_APP . "{$config['fileBase']}{$this->_file}.{$config['extension']}";
        $title = "Source for {$this->_type}:{$this->_file}";
        return $this->_output($title, $this->_createList() . highlight_file($fileName, true));
    }

    /**
     * Set file and type.
     */
    private function _setFileAndType()
    {
        $parts = explode('/', \Core::$rest);
        $this->_type = array_shift($parts);
        $this->_file = !empty($parts) ? implode('/', $parts) : 'index';
    }

    /**
     * Get config and set file/type.
     * @return type
     */
    private function _getConfig()
    {
        $this->_setFileAndType();
        $config = getKey($this->_config, $this->_type);
        if (empty($config) || !in_array($this->_file, $config['files'])) {
            \Request::redirect(self::REDIRECT_TARGET);
        }
        return $config;
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
        return '<div style="float: right;">' . implode(PHP_EOL, $result) . '</div>';
    }

    /**
     * Create section for list.
     * @param string $name
     * @param array $section
     * @return string
     */
    private function _createSection($name, $section)
    {
        $highLight = ($name == $this->_type);
        $result = "<div class=\"section\"><h3>$name</h3><ul>";
        foreach ($section['files'] as $file) {
            $curLight = $highLight && $file == $this->_file;
            $link = "/source/$name/$file";
            $class = $curLight ? 'class="text-success"' : '';
            $result .= "<li $class><a href=\"$link\" $class>$file</a>";
        }
        $result .= '</ul></div>';
        return $result;
    }
}
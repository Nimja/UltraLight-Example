<?php namespace App\Controller\Tools;
/**
 * Simple index page, with some buttons for show.
 */
class Source extends \App\Controller\Index
{
    const TYPE_CONTROLLER = 'controller';
    const TYPE_VIEW = 'view';
    const TYPE_LIBRARY = 'library';
    const REDIRECT_TARGET = '/source/controller';
    /**
     * Configuration list for the source viewing.
     * @var array
     */
    private $_config = [
        self::TYPE_CONTROLLER => [
            'fileBase' => 'controller/',
            'extension' => 'php',
            'files' => [
                'index',
                'form',
                'color',
                'ajax',
                'ajax/example',
                'ajax/error',
                'errors',
                'wrong',
                'tools/source',
            ]
        ],
        self::TYPE_VIEW => [
            'fileBase' => 'view/page/',
            'extension' => 'html',
            'files' => [
                'ajax',
                'color',
                'errors',
                'features',
                'html',
            ]
        ],
        self::TYPE_LIBRARY => [
            'fileBase' => 'library/',
            'extension' => 'php',
            'files' => [
                'sourcelist',
                'transform/custom',
            ]
        ],
    ];
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
        $this->_setFileAndType();
        $data = [
            'source' => $this->_showSource($this->_getFileName()),
            'list' => new \App\Library\Sourcelist($this->_config, "/source/{$this->_type}/{$this->_file}"),
        ];
        return $this->_output(
            "Source for {$this->_type}:{$this->_file}",
            $this->_show('page/source', $data)
        );
    }

    /**
     * Highlight source and escape for view.
     * @param string $fileName
     * @return string
     */
    private function _showSource($fileName)
    {
        return \Core\View::escape(highlight_file($fileName, true));
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
     * @return string
     */
    private function _getFileName()
    {
        $config = getKey($this->_config, $this->_type);
        if (empty($config) || !in_array($this->_file, $config['files'])) {
            \Request::redirect(self::REDIRECT_TARGET);
        }
        $fileName = implode(
            '',
            [
                PATH_APP ,
                $config['fileBase'],
                $this->_file,
                '.',
                $config['extension']
            ]
        );
        return $fileName;
    }
}
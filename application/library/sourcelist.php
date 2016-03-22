<?php namespace App\Library;
/**
 * Custom example transform.
 */
class Sourcelist
{
    /**
     * The url to the source blocks.
     */
    const URL_BASE = '/source/%s/%s';
    /**
     * Configuration array.
     *
     * @var array
     */
    private $_config;
    /**
     * Currently active url.
     *
     * @var array
     */
    private $_active;

    /**
     * Construct with configuration variable.
     *
     * @param array $config
     */
    public function __construct($config, $active)
    {
        $this->_config = $config;
        $this->_active = $active;
    }

    /**
     * Render to string.
     *
     * @return string
     */
    public function __toString()
    {
        $result = [];
        foreach ($this->_config as $name => $details) {
            $result[] = $this->_getRenderedGroup($name, $details['files']);
        }
        return implode(PHP_EOL, $result);
    }

    /**
     * Render group to string.
     *
     * @param string $name
     * @param array $files
     * @return string
     */
    private function _getRenderedGroup($name, $files)
    {
        $result = [
            '<div class="list-group">',
            '<div class="list-group-item disabled"><b>' . ucfirst($name) . '</b></div>',
        ];
        foreach ($files as $file) {
            $url = sprintf(self::URL_BASE, $name, $file);
            $active = ($url == $this->_active) ? ' active' : '';
            $result[] = "<a href=\"{$url}\" class=\"list-group-item{$active}\">{$file}</a>";
        }
        $result[] = '</div>';
        return implode(PHP_EOL, $result);
    }
}

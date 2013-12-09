<?php
namespace App\Library;
/**
 * Example of a class for the library
 */
class Buttons
{
    /**
     * Buttons as array with link => name.
     * @var array
     */
    private $_buttons;
    /**
     * Construct the buttons class.
     * @param array $buttons
     * @throws Exception
     */
    public function __construct($buttons)
    {
        if (!is_array($buttons)) {
            throw new Exception("Buttons requires an array as input.");
        }
        $this->_buttons = $buttons;
    }

    /**
     * Render the buttons as HTML.
     * @return string
     */
    public function __toString()
    {
        $result = array();
        foreach ($this->_buttons as $link => $name) {
            $result[] = "<a href=\"/{$link}\" class=\"button\">{$name}</a>";
        }
        return implode(PHP_EOL, $result);
    }
}
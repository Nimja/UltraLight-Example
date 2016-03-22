<?php
namespace App\Library\Transform;
/**
 * Custom example transform.
 */
class Custom extends \Core\View\Transform\Base
{
    /**
     * Simple transform that adds --> to the value.
     *
     * @return string
     */
    protected function _parse()
    {
        return '--&gt;' . $this->_value;
    }
}

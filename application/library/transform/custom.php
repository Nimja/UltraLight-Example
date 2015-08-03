<?php
namespace App\Library\Transform;
/**
 * Custom example transform.
 */
class Custom extends \Core\View\Transform\Base
{

    protected function _parse()
    {
        return '--&gt;' . $this->_value;
    }
}

<?php
namespace App\View\Transform;
/**
 * Custom example transform.
 *
 * @author Nimja
 */
class Custom extends \Core\View\Transform
{

    public function parse()
    {
        return '--&gt;' . $this->_value;
    }
}

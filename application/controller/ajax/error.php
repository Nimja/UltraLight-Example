<?php namespace App\Controller\Ajax;
/**
 * Simple Ajax example, automatically outputs JSON with exceptions.
 */
class Error extends \Core\Controller\Ajax
{

    protected function _run()
    {
        //We pause one quarter of a second on purpose, otherwise it's too fast.
        usleep(250000);
        throw new \Exception("Oh no! You clicked the other button!");
    }
}

<?php namespace App\Controller\Ajax;
/**
 * Simple Ajax example, automatically outputs JSON with results.
 */
class Example extends \Core\Controller\Ajax
{

    protected function _run()
    {
        //We pause one quarter of a second on purpose, otherwise it's too fast.
        usleep(250000);
        $clicked = \Request::value('clicked');
        return [
            'message' => $this->_getHelloWorld(),
            'clicked' => "You have clicked $clicked times!",
        ];
    }

    /**
     * Get semi-randomized hello world string.
     *
     * @return string
     */
    private function _getHelloWorld()
    {
        $hello = ['Hello', 'Good day', 'G\'day', 'Hi', 'Aloha', 'Hey'];
        $world = ['world', 'globe', 'planet', 'earth'];
        shuffle($hello);
        shuffle($world);
        return "{$hello[0]} {$world[0]}!";
    }
}

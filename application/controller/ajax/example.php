<?php
namespace App\Controller\Ajax;
/**
 * Simple index page, with some buttons for show.
 */
class Example extends \Core\Controller\Ajax
{

    protected function _run()
    {
        //We pause one quarter of a second on purpose.
        usleep(250000);
        $hello = array(
            'Hello',
            'Good day',
            'Hi',
            'Aloha',
            'Hey',
        );
        shuffle($hello);
        $world = array(
            'world',
            'globe',
            'planet',
            'earth',
        );
        shuffle($world);
        $clicked = \Request::value('clicked');
        return array(
            'message' => "{$hello[0]} {$world[0]}!",
            'clicked' => "You have clicked $clicked times!",
        );
    }
}
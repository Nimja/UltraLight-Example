<?php
namespace App\Controller;
/**
 * Show a system-generated error.
 *
 * Controller: "wrong" not extended from abstract controller.
 */
class Wrong
{
    function __construct()
    {
        echo "This is a controller that will fail.";
    }
}
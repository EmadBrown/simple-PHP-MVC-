<?php

/**
 * Class Error Page
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 *
 */
class ErrorPage extends Controller
{
    /**
     * PAGE: error
     * This method handles what happens when you move to http://yourproject/error (which is the default page btw)
     */
    public function index()
    {
        // debug message to show where you are, just for the demo
        //echo 'Message from Controller: You are in the controller error, using the method index()';
        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/error.php';
        require 'application/views/_templates/footer.php';
    }
 
}

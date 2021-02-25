<?php

abstract class Controller
{
    protected $title;

    function __construct($title = 'To Do List')
    {
        $this->title = $title;
    }

}

?>
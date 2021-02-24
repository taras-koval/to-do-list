<?php

abstract class Controller
{
	protected $title;

	function __construct($title = 'Document')
	{
		$this->title = $title;
	}

}

?>
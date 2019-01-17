<?php

abstract class ApplicationController {

	$controller = "";
	$action     = "";

	abstract function index();
	abstract function new();
	abstract function edit();
	abstract function delete();
	abstract function show();

}

?>
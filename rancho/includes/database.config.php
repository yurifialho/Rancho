<?php
#--------------------------------------------------------------------------
# DATABASE.CONFIG.PHP
#--------------------------------------------------------------------------
#
#	@author: Yuri Fialho - 2º TEN FIALHO
#	@since: 10/12/2014
#	@contact: yurirfialho@gmail.com
#
#--------------------------------------------------------------------------
	
	#DB username
	$username = "rancho";
	$password = "rancho";
	$host	  = "ranchodb";
	$database = "rancho";

	require_once dirname(__FILE__) . '/../libs/phpactiverecord/ActiveRecord.php';

	#Load All Models
	$modelsFolders = dirname(__FILE__) . "/../models";
	
	foreach (scandir($modelsFolders) as $modelsClass) {
		$metaDados = pathinfo($modelsClass);
		if($metaDados['extension'] == "php") {
			require_once $modelsFolders . DIRECTORY_SEPARATOR . $modelsClass;
		}
	}
	
	#Initialize database
	$cfg = ActiveRecord\Config::instance();
	$cfg->set_model_directory('.');
	$connection_string = 'mysql://'.$username.':'.$password.'@'.$host.'/rancho';
	$cfg->set_connections(array('development' => $connection_string));
	
	#ActiveRecord\Config::initialize(function($cfg)
	#{	
	#	echo $connection_string = 'mysql://'.$username.':'.$password.'@'.$host.'/rancho';
	#	die;
    #	$cfg->set_model_directory('.');
    #	$cfg->set_connections(array('development' => $connection_string));
	#});

?>
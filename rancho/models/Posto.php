<?php

require_once dirname(__FILE__) . '/../libs/phpactiverecord/ActiveRecord.php';

class Posto extends ActiveRecord\Model { 
	#config
	static $table_name = 'posto';
}

?>
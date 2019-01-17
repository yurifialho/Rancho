<?php

require_once dirname(__FILE__) . '/../libs/phpactiverecord/ActiveRecord.php';

class Aranchamento extends ActiveRecord\Model { 
	#config
	static $table_name = 'aranchamento';
	#relacionamento
	static $belongs_to = array(
 		array('usuario', 'class_name' => 'Usuario', 'foreign_key' => 'usuario_id')
 	);
}

?>
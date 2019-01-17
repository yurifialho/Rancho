<?php

require_once dirname(__FILE__) . '/../libs/phpactiverecord/ActiveRecord.php';

class UsuarioTipo extends ActiveRecord\Model { 
	#config
	static $table_name = 'usuario_tipo';
	#relacionamentos
	
	#validations
	static $validates_presence_of = array (
		array('descricao')
	);
	static $validates_size_of = array (
		array('descricao', 'within' => array(1,20))
	);
}

?>
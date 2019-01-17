<?php

require_once dirname(__FILE__) . '/../libs/phpactiverecord/ActiveRecord.php';

class Usuario extends ActiveRecord\Model { 
	#config
	static $table_name = 'usuario';
	#relacionamento
	static $belongs_to = array(
 		array('posto', 'class_name' => 'Posto', 'foreign_key' => 'posto_id'),
 		array('tipo', 'class_name' => 'UsuarioTipo', 'foreign_key' => 'usuario_tipo_id'),
 		array('setor', 'class_name' => 'Setor', 'foreign_key' => 'setor_id')
 	);
}

?>
<?php 
	require_once "../includes/database.config.php";

	session_start();

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    	$action    = $_POST['action'];
		$id 	   = $_POST['id'];
		$descricao = $_POST['descricao'];
	} else {
		$action    = $_GET['action'];
		$id 	   = $_GET['id'];
		$descricao = $_GET['descricao'];
	}

	

	if($action == "delete") {
		$produto_tipo = UsuarioTipo::find($id);
		if($produto_tipo->delete()) {
			$msg = "Objeto excluido com sucesso!";
		} else {
			$msg_erro = "Nao foi possivel excluir objeto!";
		}
	} elseif($action == "new") {
		$produto_tipo = new UsuarioTipo();
		$produto_tipo->descricao = $descricao;
		if($produto_tipo->save()){
			$msg = "Objeto salvo com sucesso!";
		} else {
			$msg_erro  = "Nao foi possivel salvar objeto!<br/>";
		}
	} elseif($action == "update") {
		$produto_tipo = UsuarioTipo::find($id);
		if($produto_tipo != null) {
			$produto_tipo->descricao = $descricao;
			if($produto_tipo->save()){
				$msg = "Objeto salvo com sucesso!";
			} else {
				$msg_erro = "Nao foi possivel salvar objeto!";
			}
		}
		
	} 
	
	header('Location: '."../views/usuario_tipo/usuario_tipo_lista.php");	
	
?>
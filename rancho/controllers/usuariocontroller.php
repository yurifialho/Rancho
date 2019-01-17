<?php 
	require_once "../includes/database.config.php";

	session_start();

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    	$action    = $_POST['action'];
		$id 	   = $_POST['id'];
		$nome	   = $_POST['nome'];
		$login     = $_POST['usuario'];
		$senha	   = $_POST['senha'];
		$posto	   = $_POST['posto'];
		$setor	   = $_POST['setor'];
		$omds	   = $_POST['omds'];
		$perfil	   = $_POST['perfil'];
	} else {
		$action    = $_GET['action'];
		$id 	   = $_GET['id'];
	}

	

	if($action == "delete") {
		$usuario = Usuario::find($id);
		if($usuario->delete()) {
			$msg = "Objeto excluido com sucesso!";
		} else {
			$msg_erro = "Nao foi possivel excluir objeto!";
		}
	} elseif($action == "new") {
		$usuario = new Usuario();
		$usuario->nome = $nome;
		$usuario->login = $login;
		$usuario->senha = md5($senha);
		$usuario->posto_id = $posto;
		$usuario->setor_id = $setor;
		$usuario->omds_id = $omds;
		$usuario->usuario_tipo_id = $perfil;
		if($usuario->save()){
			$msg = "Objeto salvo com sucesso!";
		} else {
			$msg_erro = "Nao foi possivel salvar objeto!";
		}
	} elseif($action == "update") {
		$usuario = Usuario::find($id);
		if($usuario != null) {
			$usuario->descricao = $descricao;
			if($usuario->save()){
				$msg = "Objeto salvo com sucesso!";
			} else {
				$msg_erro = "Nao foi possivel salvar objeto!";
			}
		}
		
	} 
	
	header('Location: '."../views/usuario/usuario_lista.php");	
	
?>
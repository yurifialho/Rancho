<?php 
	require_once "../includes/database.config.php";

	session_start();

	$usuarioid = $_SESSION['idusuario'];

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    	$action    = $_POST['action'];
		$id 	   = isset($_POST['id']) ? $_POST['id'] : NULL;
		$dia 	   = $_POST['dia'];
		$cafe      = isset($_POST['cafe']) ? $_POST['cafe'] : 0 ;
		$almoco    = isset($_POST['almoco']) ? $_POST['almoco'] : 0;
		$janta 	   = isset($_POST['janta']) ? $_POST['janta'] : 0;
		$ceia 	   = isset($_POST['ceia']) ? $_POST['ceia'] : 0;
		$mes       = isset($_POST["mes"]) ? $_POST["mes"] : date('m');
	} else {
		$action    = $_GET['action'];
		$id 	   = $_GET['id'];
	}


	if($action == "delete") {
		$aranchamento = Aranchamento::find($id);
		
		if($aranchamento->dia > new DateTime()) {
			if($aranchamento->delete()) {
				$msg = "Objeto excluido com sucesso!";
			} else {
				$msg_erro = "Nao foi possivel excluir objeto!";
			}
		} else {
			$msg_erro = "Voce so pode modificar arranchamentos futuros!";
		}
	} elseif($action == "new") {
		#validar data


		$date = DateTime::createFromFormat('d/m/Y', $dia);
		$aranchamento = Aranchamento::find('all', 
			array('conditions' => " dia = '".$date->format('Y-m-d')."' ".
								  " and usuario_id = ".$usuarioid));

		if( count($aranchamento) <= 0 ) {
			if($date > new DateTime()) {
				$aranchamento = new Aranchamento();
				$aranchamento->dia = $date;
				$aranchamento->tp_cafe = $cafe;
				$aranchamento->tp_almoco= $almoco;
				$aranchamento->tp_janta = $janta;
				$aranchamento->tp_ceia = $ceia;
				$aranchamento->usuario_id = $usuarioid;
				if($aranchamento->save()){
					$msg = "Objeto salvo com sucesso!";
				} else {
					$msg_erro = "Nao foi possivel salvar objeto!";
				}
			} else {
				$msg_erro = "Voce so pose arranchar para os proximos dias!";
			}
		} else {
			$msg_erro = "Dia ja foi inserido!";	
		}
	} 	
	
	header('Location: '."../views/aranchamento/aranchamento_lista.php?msg=".$msg."&msg_erro=".$msg_erro."&mes=".$mes);	
	
?>
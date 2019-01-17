<?php 
	session_start();
	define('ROOT', "/."); 
	
	

	require_once "database.config.php";


	#verifica se usuario esta logado
	if(!isset($_SESSION['idusuario'])) {
		header('Location: '."/login.php");	
	}

?>
<!DOCTYPE html>
<html>
<head>
	
<?php
	echo '<script src="'.ROOT.'/js/jquery-1.11.1.min.js"></script>';
	echo '<script src="'.ROOT.'/js/bootstrap.min.js"></script>';
	echo '<script src="'.ROOT.'/js/bootstrap-datepicker.js"></script>';
	echo '<link rel="stylesheet" type="text/css" href="'.ROOT.'/css/bootstrap.min.css"></link>';
	echo '<link rel="stylesheet" type="text/css" href="'.ROOT.'/css/datepicker.css"></link>';
	echo '<link rel="stylesheet" type="text/css" href="'.ROOT.'/css/starter-template.css"></link>';
?>
<style type="text/css">
	.green{color:green;}
	.red{color:red;}
</style>
</head>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">RANCHO</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="./../../views/aranchamento/aranchamento_lista.php">Ticket</a></li>
        <li><a href="./../../views/aranchamento/aranchamento_rancho_lista.php">Rancho</a></li>
        <li><a href="./../../views/usuario/usuario_lista.php">Usuario</a></li>
        <li><a href="./../../views/usuario_tipo/usuario_tipo_lista.php">Usuario Tipo</a></li>
        <li><a href="/~yurifialho/rancho/logout.php">Logout (<?php echo (Usuario::find($_SESSION['idusuario'])->nome)?>)</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
<div class="container">
  
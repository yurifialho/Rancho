<?php if(isset($_GET['msg']) && $_GET['msg'] != "") { ?>  
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert">
    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
  </button>
  <strong>Sucesso!</strong> <?php echo $_GET['msg']; ?>
</div>
<?php } ?>
<?php if((isset($_GET['msg_erro']) && $_GET['msg_erro'] != "") || 
		 (isset($_SESSION['msg_erro']) && $_SESSION['msg_erro'] != "")) { ?>  
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert">
    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
  </button>
  <strong>Erro!</strong> <?php echo $_GET['msg_erro']; ?><?php echo $_SESSION['msg_erro']; ?>
</div>
<?php 
	unset($_SESSION['msg_erro']);
	} 
?>
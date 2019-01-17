<?php include      "../../includes/header.php"; ?>

<body>
<?php include      "../../includes/messages.php"; ?>
<?php 

    $objUsuario = new Usuario();

    if(isset($_GET['id'])) {
      $objUsuario = Usuario::find($_GET['id']);
    }



?>
<div class="panel panel-default">
  <div class="panel-heading">Form Usuario</div>
  <div class="panel-body">
    <form role="form" class="form-horizontal" action="../../controllers/usuariocontroller.php" method="post" >
      <input type="hidden" id="action" name="action" value="<?php echo $_GET['action']; ?>"/>
      <input type="hidden" id="id2" name="id" value="<?php echo $_GET['id']; ?>"/>
      <div class="form-group">
        <label for="id" class="col-sm-2 control-label">Cod.</label>
        <div class="col-sm-10">
          <input type="text"  class="form-control" 
               size="4" id="id" name="id"
               value="<?php echo $_GET['id'] ?>" 
               disabled>
        </div>
      </div>
      <div class="form-group">
        <label for="id" class="col-sm-2 control-label">Nome</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" required="true"
               placeholder="Nome" id="nome" name="nome"
               value="<?php echo $objUsuario->nome ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="id" class="col-sm-2 control-label">Usuario</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" required="true"
               placeholder="Usuario" id="usuario" name="usuario"
               value="<?php echo $objUsuario->login ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="id" class="col-sm-2 control-label">Senha</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" required="true"
               placeholder="Senha" id="senha" name="senha"
               value="<?php echo $objUsuario->senha ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="posto" class="col-sm-2 control-label">Posto</label>
        <div class="col-sm-10">
          <select class="form-control" id="posto" name="posto" required="true">
            <option value="">..::SELECIONE::..</option>
            <?php foreach (Posto::find('all', array('order' => ' ordem  ')) as $posto) { ?>
            <option value="<?php echo $posto->id ?>" <?php echo $objUsuario->posto_id == $posto->id ? " checked" : "" ?>><?php echo $posto->descricao ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="setor" class="col-sm-2 control-label">Setor</label>
        <div class="col-sm-10">
          <select class="form-control" id="setor" name="setor" required="true">
            <option value="">..::SELECIONE::..</option>
            <?php foreach (Setor::all() as $setor) { ?>
            <option value="<?php echo $setor->id ?>" <?php echo $objUsuario->setor_id == $setor->id ? " checked" : "" ?>><?php echo $setor->descricao ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="omds" class="col-sm-2 control-label">Omds</label>
        <div class="col-sm-10">
          <select class="form-control" id="omds" name="omds" required="true">
            <option value="">..::SELECIONE::..</option>
            <?php foreach (Omds::all() as $omds) { ?>
            <option value="<?php echo $omds->id ?>" <?php echo ($objUsuario->omds_id == $omds->id ? " checked" : "") ?>><?php echo $omds->descricao ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="perfil" class="col-sm-2 control-label">Perfil</label>
        <div class="col-sm-10">
          <select class="form-control" id="perfil" name="perfil" required="true">
            <option value="">..::SELECIONE::..</option>
            <?php foreach (UsuarioTIpo::all() as $perfil) { ?>
            <option value="<?php echo $perfil->id ?>"<?php echo $objUsuario->usuario_tipo_id == $perfil->id ? " checked" : "" ?>><?php echo $perfil->descricao ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success">Salvar</button>
          <a href="usuario_lista.php">
            <button type="button" class="btn btn-danger">Voltar</button>
          </a>
        </div>
      </div>
    </form>
  </div>
</div>
<?php include "../../includes/header.php"; ?>

<?php include      "../../includes/header.php"; ?>

<body>
<?php include      "../../includes/messages.php"; ?>
<div class="panel panel-default">
  <div class="panel-heading">Listar Usuario</div>
  <div class="panel-body">
    <a href="usuario_form.php?action=new">
      <input type="button" class="btn btn-success" name="submint" value="Adicionar"/>
    </a>
    <table class="table"  cellSpacing=1 cellPadding=4 width="100%" border=0>
      <thead>
      <tr> 
        <th>Cod.</th>
        <th>Nome</th>
        <th>Acao</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach (Usuario::all() as $usuario) { ?>
      <tr>
        <td><?php echo $usuario->id ?></td>
        <td><?php echo $usuario->nome ?></td>
        <td>
          <a href="usuario_form.php?action=update&id=<?php echo $usuario->id ?>">
          <button type="button" class="btn btn-default btn-xs">
            <span class="glyphicon glyphicon-pencil"></span> Editar
          </button>
          </a>
          <a href="../../controllers/usuariocontroller.php?action=delete&id=<?php echo $usuario->id ?>"
            onclick="return confirm('Deseja realmente remover?');">
          <button type="button" class="btn btn-danger btn-xs">
            <span class="glyphicon glyphicon-trash"></span> Excluir
          </button>
        </a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
    </table>
  </div>
</div>
<?php include "../../includes/header.php"; ?>
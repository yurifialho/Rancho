
<?php include      "../../includes/header.php"; ?>

<body>
<?php include      "../../includes/messages.php"; ?>
<?php
  $mes = isset($_GET["mes"]) ? $_GET["mes"] : date('m'); 
  $ano = isset($_GET["ano"]) ? $_GET["ano"] : date('Y'); 
?>
<div class="panel panel-default">
  <div class="panel-heading">Listar Arranchamento</div>
  <div class="panel-body">
   <div class="panel panel-default">
    
    <div class="panel-body">
    <form class="form-inline" role="form" action="../../controllers/aranchamentocontroller.php" method="post">
      <input type="hidden" id="action" name="action" value="new"/>
      <input type="hidden" id="mes" name="mes" value="<?php echo $mes ?>"/>
      <div class="form-group">
        <div class="col-sm-10">
          <input type="text" class="datepicker" required="true"
               placeholder="Dia" id="dia" name="dia"
               value="">
        </div>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" id="cafe" name="cafe" value="1"> Cafe
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" id="almoco" name="almoco" value="1"> Almoco
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" id="janta" name="janta" value="1"> Jantar
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" id="ceia" name="ceia" value="1"> Ceia
        </label>
      </div>
      <button type="submit" class="btn btn-success">Salvar</button>
    </form>
    </div>
    </div>
    <center>
          <?php 
            for($i = 1; $i <= 12; $i++) {
          ?>
          <a href="./aranchamento_lista.php?mes=<?php echo $i ?>" >
          <button type="button" class="btn btn-<?php echo ($mes == $i && $ano == date('Y') ? 'info' : 'default') ?> btn-xs">
            <?php echo date('F', strtotime(date("Y")."/".$i."/01")) ?>
          </button>
          </a>
          <?php
            }
          ?>
          <a href="./aranchamento_lista.php?mes=1&ano=<?php echo (date('Y')+1)?>" >
          <button type="button" class="btn btn-<?php echo ($mes == 1 && $ano == (date('Y')+1) ? 'info' : 'default') ?> btn-xs">
            <?php echo (date('Y')+1) ?> <?php echo date('F', strtotime((date("Y")+1)."/01/01")) ?>
          </button>
          </a>
        </center>
    <table class="table"  cellSpacing=1 cellPadding=4 width="100%" border=0>
      <thead>
      <tr> 
        <th>Dia</th>
        <th>Cafe</th>
        <th>Almoco</th>
        <th>Janta</th>
        <th>Ceia</th>
        <th>Acao</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach (Aranchamento::find('all', array('conditions' => 'extract(month from dia) = '.$mes.
                                                                     ' and extract(year from dia) = '.$ano.
                                                                     ' and usuario_id = '.$_SESSION['idusuario'], 
                                                     'order' => 'dia asc')) as $aranchamento) { ?>
      <tr>
        <td><?php echo $aranchamento->dia->format('d/m/Y') ?></td>
        <td>
          <?php 
            if($aranchamento->tp_cafe == 1) {
              echo '<span class="glyphicon glyphicon-ok green"></span>';
            } else {
              echo '<span class="glyphicon glyphicon-remove red"></span>' ;
            }
          ?>
        </td>
        <td>
           <?php 
            if($aranchamento->tp_almoco == 1) {
              echo '<span class="glyphicon glyphicon-ok green"></span>';
            } else {
              echo '<span class="glyphicon glyphicon-remove red"></span>' ;
            }
          ?>
        </td>
        <td>
           <?php 
            if($aranchamento->tp_janta == 1) {
              echo '<span class="glyphicon glyphicon-ok green"></span>';
            } else {
              echo '<span class="glyphicon glyphicon-remove red"></span>' ;
            }
          ?>
        </td>
        <td>
           <?php 
            if($aranchamento->tp_ceia == 1) {
              echo '<span class="glyphicon glyphicon-ok green"></span>';
            } else {
              echo '<span class="glyphicon glyphicon-remove red"></span>' ;
            }
          ?>
        </td>
        <td>
          <a href="../../controllers/aranchamentocontroller.php?action=delete&id=<?php echo $aranchamento->id ?>"
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
<script type="text/javascript">
  jQuery('.datepicker').datepicker({
    format: 'dd/mm/yyyy'
  });
</script>
<?php include "../../includes/header.php"; ?>
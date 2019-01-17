
<?php include      "../../includes/header.php"; ?>

<body>
<?php include      "../../includes/messages.php"; ?>
<?php
  $dia      = isset($_GET["dia"]) ? $_GET["dia"] : ""; 
  $refeicao = isset($_GET["refeicao"]) ? $_GET["refeicao"] : "";
  $posto_tipo    = isset($_GET["posto_tipo"]) ? $_GET["posto_tipo"] : "";

?>
<div class="panel panel-default">
  <div class="panel-heading">Listar Arranchamento</div>
  <div class="panel-body">
   <div class="panel panel-default hidden-print">
    
    <div class="panel-body">
    <form class="form-inline " role="form" action="aranchamento_rancho_lista" method="get">
      <input type="hidden" id="action" name="action" value="new"/>
      <div class="form-group">
        <label for="refeicao">Dia:</label>
        
          <input type="text" class="datepicker" required="true"
               placeholder="Dia" id="dia" name="dia"
               value="">
        
      </div>
      <div class="form-group">
        <label for="refeicao">Refeicao:</label>
          <select class="form-control" id="refeicao" name="refeicao">
            <option value="0">Todos</option>
            <option value="tp_cafe" <?php echo ($refeicao == "tp_cafe" ? "checked" : "") ?>>Cafe</option>
            <option value="tp_almoco" <?php echo ($refeicao == "tp_almoco" ? "checked" : "") ?>>Almoco</option>
            <option value="tp_jantar" <?php echo ($refeicao == "tp_jantar" ? "checked" : "") ?>>Jantar</option>
            <option value="tp_ceia" <?php echo ($refeicao == "tp_ceia" ? "checked" : "") ?>>Ceia</option>
          </select>
      </div>
      <div class="form-group">
        <label for="posto">Posto:</label>
          <select class="form-control" id="posto_tipo" name="posto_tipo">
            <option value="0">Todos</option>
            <option value="1" <?php echo ($posto_tipo == "1" ? "checked" : "") ?>>Oficial</option>
            <option value="2" <?php echo ($posto_tipo == "2" ? "checked" : "") ?>>ST/SGT</option>
            <option value="3" <?php echo ($posto_tipo == "3" ? "checked" : "") ?>>CB/SD</option>
          </select>
      </div>
      <button type="submit" class="btn btn-success">Pesquisar</button>
    </form>
    </div>
    </div>
    <table class="table"  cellSpacing=1 cellPadding=4 width="100%" border=0>
      <thead>
      <tr> 
        <th>Dia</th>
        <th>Posto</th>
        <th>Militar</th>
        <th>Cafe</th>
        <th>Almoco</th>
        <th>Janta</th>
        <th>Ceia</th>
      </tr>
    </thead>
    <tbody>
      <?php 
          if( $dia != "" && $refeicao != "" && $posto_tipo != "") {
            if($posto_tipo != "0") {
              $sqlPosto = " and p.tipo = ".$posto_tipo;
            } else {
              $sqlPosto = "";
            }
            if($refeicao != "0") {
              $sqlRefeicao = " and ".$refeicao." = true ";
            } else {
              $sqlRefeicao = "";
            }
          $join = " JOIN usuario u ON (aranchamento.usuario_id = u.id) ";
          $join.= " JOIN posto p ON (u.posto_id = p.id) ";    
          foreach (Aranchamento::find('all', array('conditions' => " dia = '".DateTime::createFromFormat('d/m/Y', $dia)->format('Y-m-d')."'".
                                                                     $sqlPosto.$sqlRefeicao,
                                                     'joins' => $join, 
                                                     'order' => 'dia asc, u.nome asc')) as $aranchamento) { ?>
      <tr>
        <td><?php echo $aranchamento->dia->format('d/m/Y') ?></td>
        <td><?php echo $aranchamento->usuario->posto->descricao ?></td>
        <td><?php echo $aranchamento->usuario->nome ?></td>
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
      </tr>
      <?php }} ?>
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
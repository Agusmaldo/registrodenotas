<?php use_helper('jQuery')?>


<?php echo use_stylesheet('/css/demos.css')?>
<?php echo use_stylesheet('/css/demo_table.css')?>
<?php echo use_javascript('/js/jquery.dataTables.js')?>
<?php echo use_javascript('/js/tablaRecientes1.js')?>


<?php echo javascript_tag(jq_remote_function(array('update'=>'formulario','url'=>'ingresoDatos1/new'))) ?>

<div class="ui-state-default ui-corner-all" style="margin:5px 5px;">

<div id="formulario"></div>

<h1>Movimientos Recientes</h1>

<?php include_partial('listaRecientes1', array('movimientos' => $movimientos,'aplicacion'=>'ingresoDatos1')) ?>

</div>
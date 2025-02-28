<?php include_partial('assets')?>

<div class="ui-state-default ui-corner-all" style="margin:5px 5px;">

<h1>Movimientos Pendientes</h1>

<?php include_partial('ingresoDatos1/listaRecientes1', array('movimientos' => $movimientosPendientes,'aplicacion'=>'ingresoDatos2')) ?>

<div class="ui-state-default ui-corner-all" style="margin:5px 5px;">
<div id="formulario"></div>
</div>

<h1>Movimientos Recientes</h1>

<?php include_partial('ingresoDatos2/listaRecientes2', array('movimientos' => $movimientos,'aplicacion'=>'ingresoDatos2')) ?>
<?php use_helper('jQuery')?>

<?php echo javascript_tag(jq_remote_function(array('update'=>'tablaSubtitulos','url'=>'titSubt/index?movimiento_id_parent='.$movimiento_id_parent))) ?>

<?php include_partial('form', array('form' => $form,'form_aux'=>$form_aux,'movimiento_id_parent'=>$movimiento_id_parent)) ?>

<div id="tablaSubtitulos"></div>


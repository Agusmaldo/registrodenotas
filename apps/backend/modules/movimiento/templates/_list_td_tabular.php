<td class="sf_admin_text sf_admin_list_td_cudap">
  <?php echo $movimiento->getRemitente() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_cnrt_pendiente">
  <?php echo $movimiento->getDestinatario() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_fecha_recepcion">
  <?php echo $movimiento->getCudap() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_fecha_elevacion">
  <?php echo $movimiento->getFechaDocumento() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_responsable">
  <?php echo $movimiento->getArea()->getDescripcion() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_responsable">
  <?php echo $movimiento->getEstado()->getDescripcion() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_comentarios" style="width: 30%!important;">
  <?php echo $movimiento->getComentarios() ?>
</td>


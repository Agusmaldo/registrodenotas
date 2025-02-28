<?php use_helper('jQuery')?>

<table class="ui-state-default" border="1">
  <thead class="ui-tabs-panel ui-widget-content">
    <tr>
      <th>Titulo</th>
      <th>Subtitulo</th>
      <th>Accion</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($subtitulosx_movs as $subtitulosx_mov): ?>
    <tr>
      <td><?php echo $subtitulosx_mov->getSubtitulo()->getTitulo() ?></td>
      <td>/<?php echo $subtitulosx_mov->getSubtitulo() ?></td>
      <td><?php echo jq_button_to_remote('Eliminar', array('update'=> 'tablaSubtitulos',
                'url'=> 'titSubt/delete?movimiento_id='.$subtitulosx_mov->getMovimientoId().'&subtitulo_id='.$subtitulosx_mov->getSubtituloId())) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
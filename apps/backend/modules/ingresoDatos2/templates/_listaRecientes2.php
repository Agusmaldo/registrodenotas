<div style="margin:5px 5px;">
<table id="tablaRecientes2" cellpadding="0" cellspacing="0" border="0" class="display ui-helper-reset">
  <thead>
    <tr> 
      <th>Id</th>
      <th>Fecha recepcion</th>
      <th>Remitente</th>
      <th>Fecha elevacion</th>      
      <th>Destinatario</th>  
      <th>Cudap</th>
      <th>Referencia</th>
      <th>Fecha documento</th>
      <th>Cnrt pendiente</th>      
      <th>Cantidad Folios</th>
      <th>Vinculo Exp</th>
      <th>Titulo/Subtitulo</th>
      <th>Asunto</th>
      <th>Acciones</th>
    </tr>        
  </thead>
  <tbody>
    <?php foreach ($movimientos as $movimiento): ?>
    <tr>
      <td><?php echo $movimiento->getId() ?></td>
      <td><?php echo $movimiento->getFechaRecepcion() ?></td>
      <td><?php echo $movimiento->getRemitente() ?></td> 
      <td><?php echo $movimiento->getFechaElevacion() ?></td> 
      <td><?php echo $movimiento->getDestinatario() ?></td>
      <td><?php echo $movimiento->getCudap() ?></td>
      <td><?php echo $movimiento->getReferencia() ?> <?php echo $movimiento->getReferenciaNro() ?></td>
      <td><?php echo $movimiento->getFechaDocumento() ?></td>
      <td><?php echo get_partial('ingresoDatos1/list_field_boolean', array('value' => $movimiento->getCnrtPendiente())) ?></td>      
      <td><?php echo $movimiento->getCantidadFolios() ?></td>
      <td><?php echo $movimiento->getVinculo_exp() ?></td>
      <td><?php echo Movimiento::getTitulosySubtitulos($movimiento) ?></td>
      <td><?php echo $movimiento->getAsunto() ?></td>
      <td><?php echo jq_link_to_remote('EDITAR', array('update'=> 'formulario','url'=> $aplicacion.'/edit?id='.$movimiento->getId())) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
<div style="margin:5px 5px;">
<table id="tablaRecientes" cellpadding="0" cellspacing="0" border="0" class="display ui-helper-reset">
  <thead>
    <tr> 
      <th style='display:none'>Id</th>
      <th style='display:none'>Fecha recepcion</th>
      <th>Remitente</th>
      <th style='display:none'>Fecha elevacion</th>      
      <th>Destinatario</th>  
      <th>N°</th>
      <th>Area</th>
      <th>Estado</th>
      <th style='display:none'>Referencia</th>
      <th>Fecha documento</th>
      <th style='display:none'>Cnrt pendiente</th>      
      <th>Referencia</th>
      <th>Acciones</th>
    </tr>        
  </thead>
  <tbody>
  <?php foreach ($movimientos as $movimiento): ?>
    <tr>
      <td style='display:none'><?php echo $movimiento->getId() ?></td>
      <td style='display:none'><?php echo $movimiento->getFechaRecepcion() ?></td>
      <td><?php echo $movimiento->getRemitente() ?></td> 
      <td style='display:none'><?php echo $movimiento->getFechaElevacion() ?></td> 
      <td><?php echo $movimiento->getDestinatario() ?></td>
      <td><?php echo $movimiento->getCudap() ?></td>
      <td><?php echo $movimiento->getArea()->getDescripcion() ?></td>
      <td><?php echo $movimiento->getEstado()->getDescripcion() ?></td>
      <td style='display:none'><?php echo $movimiento->getReferencia() ?> <?php echo $movimiento->getReferenciaNro() ?></td>
      <td><?php echo $movimiento->getFechaDocumento() ?></td>
      <td style='display:none'><?php echo get_partial('ingresoDatos1/list_field_boolean', array('value' => $movimiento->getCnrtPendiente())) ?></td>      
      <td><?php echo $movimiento->getComentarios() ?></td>
      <td><?php echo jq_link_to_remote('EDITAR/COMPLETAR', array('update'=> 'formulario','url'=> $aplicacion.'/edit?id='.$movimiento->getId())) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
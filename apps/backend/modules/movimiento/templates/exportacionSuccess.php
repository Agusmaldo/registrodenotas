<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
<table>
  <thead>
    <tr> 
      <th>Cudap</th>
      <th>Tema</th>
      <th>Asunto</th>
      <th>Fecha recepcion</th>
      <th>Remitente</th>
      <th>Fecha elevacion</th>      
      <th>Destinatario</th>       
      <th>Area</th>
      <th>Referencia</th>
      <th>Fecha documento</th>      
      <th>Cantidad Folios</th>
      <th>Vinculo - Exp. origen</th>
    </tr>        
  </thead>
  <tbody>
    <?php foreach ($movimientos as $movimiento): ?>
    <tr>
      <td><?php echo $movimiento->getCudap() ?></td>
      <td><?php echo Movimiento::getTitulosySubtitulosRaw($movimiento) ?></td>
      <td><?php echo $movimiento->getAsunto() ?></td>
      <td><?php echo $movimiento->getFechaRecepcion() ?></td>
      <td><?php echo $movimiento->getRemitente() ?></td> 
      <td><?php echo $movimiento->getFechaElevacion() ?></td> 
      <td><?php echo $movimiento->getDestinatario() ?></td>      
      <td><?php echo $movimiento->getResponsable()->getUsuario() ?></td>
      <td><?php echo $movimiento->getReferencia() ?> <?php echo $movimiento->getReferenciaNro() ?></td>
      <td><?php echo $movimiento->getFechaDocumento() ?></td>   
      <td><?php echo $movimiento->getCantidadFolios() ?></td>
      <td><?php echo $movimiento->getVinculoExp() ? $movimiento->getVinculoExp() : "" ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php use_helper('jQuery') ?>

<h3>Destinatarios/Remitentes</h3>
<table>
    <tbody>
            <?php foreach ($desti_remis as $desti_remi): ?>

                <tr>
                    <td> <?php echo $desti_remi->getDescripcion() ?></td> 
                    <?php if ($desti_remi->getInactivo()==false): ?>
                        <td style="background-color: #22CC22"><?php echo jq_link_to_remote('-  Activo  -', array('update' => 'destiRemiList', 'url' => 'destiRemi/desactivar?id=' . $desti_remi->getId())) ?></td>   
                    <?php else:?>
                        <td style="background-color: #CC3333"><?php echo jq_link_to_remote('- Inactivo -', array('update' => 'destiRemiList', 'url' => 'destiRemi/activar?id=' . $desti_remi->getId())) ?></td>
                    <?php endif;?>
                </tr>
            <?php endforeach; ?>
    </tbody>
</table>

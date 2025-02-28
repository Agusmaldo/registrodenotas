<?php use_helper('jQuery') ?>

<h3>Referencias</h3>
<table>
    <tbody>
            <?php foreach ($referencias as $referencia): ?>

                <tr>
                    <td> <?php echo $referencia->getDescripcion() ?></td> 
                    <?php if ($referencia->getInactivo()==false): ?>
                        <td style="background-color: #22CC22"><?php echo jq_link_to_remote('-  Activo  -', array('update' => 'refList', 'url' => 'referencia/desactivar?id=' . $referencia->getId())) ?></td>   
                    <?php else:?>
                        <td style="background-color: #CC3333"><?php echo jq_link_to_remote('- Inactivo -', array('update' => 'refList', 'url' => 'referencia/activar?id=' . $referencia->getId())) ?></td>
                    <?php endif;?>
                </tr>
            <?php endforeach; ?>
    </tbody>
</table>
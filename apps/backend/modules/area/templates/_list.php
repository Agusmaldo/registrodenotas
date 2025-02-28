<?php use_helper('jQuery') ?>

<h3>Areas</h3>
<table>
    <tbody>
            <?php foreach ($areas as $area): ?>

                <tr>
                    <td> <?php echo $area->getDescripcion() ?></td> 
                    <?php if ($area->getInactivo()==false): ?>
                        <td style="background-color: #22CC22"><?php echo jq_link_to_remote('-  Activo  -', array('update' => 'areaList', 'url' => 'area/desactivar?id=' . $area->getId())) ?></td>   
                    <?php else:?>
                        <td style="background-color: #CC3333"><?php echo jq_link_to_remote('- Inactivo -', array('update' => 'areaList', 'url' => 'area/activar?id=' . $area->getId())) ?></td>
                    <?php endif;?>
                </tr>
            <?php endforeach; ?>
    </tbody>
</table>
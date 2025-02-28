<?php use_helper('jQuery') ?>

<h3>Ultimas Areas</h3>
<table>
    <tbody>
        <?php if (count($areaEliminables)>0): ?>
            <?php foreach ($areaEliminables as $area): ?>

                <tr>
                    <td> <?php echo $area->getDescripcion() ?></td>      
                    <td><?php echo jq_link_to_remote('- Eliminar -', array('update' => 'areaAdm', 'url' => 'area/delete?id=' . $area->getId())) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td> ------------------ </td>      
            </tr>
        <?php endif; ?>
    </tbody>
</table>
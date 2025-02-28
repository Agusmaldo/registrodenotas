<?php use_helper('jQuery') ?>

<h3>Ultimas Referencias</h3>
<table>
    <tbody>
        <?php if (count($refEliminables)>0): ?>
            <?php foreach ($refEliminables as $referencia): ?>

                <tr>
                    <td> <?php echo $referencia->getDescripcion() ?></td>      
                    <td><?php echo jq_link_to_remote('- Eliminar -', array('update' => 'referenciaAdm', 'url' => 'referencia/delete?id=' . $referencia->getId())) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td> ------------------ </td>      
            </tr>
        <?php endif; ?>
    </tbody>
</table>
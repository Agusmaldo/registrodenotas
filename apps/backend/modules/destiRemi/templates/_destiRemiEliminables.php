<?php use_helper('jQuery') ?>

<h3>Ultimos Destinatarios/Remitentes</h3>
<table>
    <tbody>
        <?php if (count($destiRemiEliminables)>0): ?>
            <?php foreach ($destiRemiEliminables as $destiRemi): ?>

                <tr>
                    <td> <?php echo $destiRemi->getDescripcion() ?></td>      
                    <td><?php echo jq_link_to_remote('- Eliminar -', array('update' => 'destiRemiAdm', 'url' => 'destiRemi/delete?id=' . $destiRemi->getId())) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td> ------------------ </td>      
            </tr>
        <?php endif; ?>
    </tbody>
</table>
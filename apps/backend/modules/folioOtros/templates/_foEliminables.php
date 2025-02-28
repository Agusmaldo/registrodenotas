<?php use_helper('jQuery') ?>

<h3>Ultimos Folios</h3>
<table>
    <tbody>
        <?php if (count($foEliminables)>0): ?>
            <?php foreach ($foEliminables as $folio): ?>

                <tr>
                    <td> <?php echo $folio->getDescripcion() ?></td>      
                    <td><?php echo jq_link_to_remote('- Eliminar -', array('update' => 'folioOtrosAdm', 'url' => 'folioOtros/delete?id=' . $folio->getId())) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td> ------------------ </td>      
            </tr>
        <?php endif; ?>
    </tbody>
</table>
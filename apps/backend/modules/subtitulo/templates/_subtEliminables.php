<?php use_helper('jQuery') ?>

<h3>Ultimos Subtitulos</h3>
<table>
    <tbody>
        <?php if (count($subtEliminables)>0): ?>
            <?php foreach ($subtEliminables as $subtitulo): ?>
                <tr>
                    <td><?php echo $subtitulo->getTitulo() ?> </td>
                    <td> / </td>
                    <td> <?php echo $subtitulo->getDescripcion() ?></td>      
                    <td><?php echo jq_link_to_remote('- Eliminar -', array('update' => 'subtAdm', 'url' => 'subtitulo/delete?id=' . $subtitulo->getId())) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td> ------------------ </td>      
            </tr>
        <?php endif; ?>
    </tbody>
</table>

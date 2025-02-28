<?php use_helper('jQuery') ?>

<h3>Ultimos Titulos</h3>
<table>
    <tbody>
        <?php if (count($titEliminables)>0): ?>
            <?php foreach ($titEliminables as $titulo): ?>

                <tr>
                    <td> <?php echo $titulo->getDescripcion() ?></td>      
                    <td><?php echo jq_link_to_remote('- Eliminar -', array('update' => 'titAdm', 'url' => 'titulo/delete?id=' . $titulo->getId())) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td> ------------------ </td>      
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php use_helper('jQuery') ?>

<h3>Ultimos Responsables</h3>
<table>
    <tbody>
        <?php if (count($respEliminables)>0): ?>
            <?php foreach ($respEliminables as $responsable): ?>

                <tr>
                    <td> <?php echo $responsable->getUsuario() ?></td>      
                    <td><?php echo jq_link_to_remote('- Eliminar -', array('update' => 'responsablesAdm', 'url' => 'responsable/delete?id=' . $responsable->getId())) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td> ------------------ </td>      
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php use_helper('jQuery') ?>
<?php echo javascript_tag(jq_remote_function(array('update' => 'destiRemiEliminables', 'url' => 'destiRemi/eliminar'))) ?>
<?php echo javascript_tag(jq_remote_function(array('update' => 'destiRemiList', 'url' => 'destiRemi/list'))) ?>

<?php if ($sf_user->hasFlash('notice')): ?>
    <div class="flash_notice ui-state-highlight"><?php echo $sf_user->getFlash('notice') ?></div>
<?php endif ?>
<table>
    <tbody>
        <tr>
            <td>
                <h3>Nuevo Destinatario/Remitente</h3>

                <?php include_partial('form', array('form' => $form)) ?>
                <div id="destiRemiEliminables"></div>
            </td>
            <td>
                <?php echo image_tag("flechaDerecha.png", array('size' => '35x35')) ?>
            </td>
            <td>
                <div id="destiRemiList"></div>  
            </td>
        </tr>
    </tbody>
</table>
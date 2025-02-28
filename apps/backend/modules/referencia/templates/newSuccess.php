<?php use_helper('jQuery') ?>
<?php echo javascript_tag(jq_remote_function(array('update' => 'refEliminables', 'url' => 'referencia/eliminar'))) ?>
<?php echo javascript_tag(jq_remote_function(array('update' => 'refList', 'url' => 'referencia/list'))) ?>

<?php if ($sf_user->hasFlash('notice')): ?>
    <div class="flash_notice ui-state-highlight"><?php echo $sf_user->getFlash('notice') ?></div>
<?php endif ?>
<table>
    <tbody>
        <tr>
            <td>
                <h3>Nueva Referencia</h3>

                <?php include_partial('form', array('form' => $form)) ?>
                <div id="refEliminables"></div>
            </td>
            <td>
                <?php echo image_tag("flechaDerecha.png", array('size' => '35x35')) ?>
            </td>
            <td>
                <div id="refList"></div>  
            </td>
        </tr>
    </tbody>
</table>
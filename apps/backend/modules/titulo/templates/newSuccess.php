<?php use_helper('jQuery') ?>
<?php echo javascript_tag(jq_remote_function(array('update' => 'titEliminables', 'url' => 'titulo/eliminar'))) ?>
<?php echo javascript_tag(jq_remote_function(array('update' => 'titList', 'url' => 'titulo/list'))) ?>

<?php if ($sf_user->hasFlash('notice')): ?>
    <div class="flash_notice ui-state-highlight"><?php echo $sf_user->getFlash('notice') ?></div>
<?php endif ?>
<table>
    <tbody>
        <tr>
            <td>
                <h3>Nuevo Titulo</h3>

                <?php include_partial('form', array('form' => $form)) ?>
                <div id="titEliminables"></div>
            </td>
            <td>
                <?php echo image_tag("flechaDerecha.png", array('size' => '35x35')) ?>
            </td>
            <td>
                <div id="titList"></div>  
            </td>
        </tr>
    </tbody>
</table>
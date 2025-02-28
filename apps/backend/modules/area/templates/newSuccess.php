<?php use_helper('jQuery') ?>
<?php echo javascript_tag(jq_remote_function(array('update' => 'areaEliminables', 'url' => 'area/eliminar'))) ?>
<?php echo javascript_tag(jq_remote_function(array('update' => 'areaList', 'url' => 'area/list'))) ?>

<?php if ($sf_user->hasFlash('notice')): ?>
    <div class="flash_notice ui-state-highlight"><?php echo $sf_user->getFlash('notice') ?></div>
<?php endif ?>
<table>
    <tbody>
        <tr>
            <td>
                <h3>Nueva Area</h3>

                <?php include_partial('form', array('form' => $form)) ?>
                <div id="areaEliminables"></div>
            </td>
            <td>
                <?php echo image_tag("flechaDerecha.png", array('size' => '35x35')) ?>
            </td>
            <td>
                <div id="areaList"></div>  
            </td>
        </tr>
    </tbody>
</table>
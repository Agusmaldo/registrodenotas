<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_helper('jQuery') ?>
     
<?php echo jq_form_remote_tag(array(
                        'update' => 'tablaSubtitulos',
                        'url' => url_for('titSubt/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?movimiento_id=' . $form->getObject()->getMovimientoId() . '&subtitulo_id=' . $form->getObject()->getSubtituloId() : '?movimiento_id_parent='.$movimiento_id_parent)),
                      )) ?>

    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <table>
        <tfoot>
            <tr>
                <td colspan="2">
                    <?php echo $form->renderHiddenFields(false) ?>
                    <?php if (!$form->getObject()->isNew()): ?>
                        &nbsp;<?php echo link_to('Delete', 'titSubt/delete?movimiento_id=' . $form->getObject()->getMovimientoId() . '&subtitulo_id=' . $form->getObject()->getSubtituloId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
                    <?php endif; ?>
                    <input type="submit" value="Agregar" />
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?php echo $form->renderGlobalErrors() ?>
            <tr>

                <th><?php echo $form_aux['titulo_id']->renderLabel() ?></th>
                <td>
                    <?php
                    echo $form_aux['titulo_id']->render(array(
                        'onchange' => jq_remote_function(array(
                            'update' => 'subtitulos_select_id', //dom id
                            'url' => 'titSubt/updateSubt', //the action to be called
                            'method' => 'get',
                            'with' => "'titulo_id=' + this.options[this.selectedIndex].value",
                        ))
                    ))
                    ?>
                </td>
                <td style="display:none">
                    <input id="subtitulosx_mov_movimiento_id" name="subtitulosx_mov[movimiento_id]"  type="text" value="<?php echo $movimiento_id_parent ?>"/> 
                  <!--  <?php echo $form['movimiento_id'] ?> -->
                </td>

                <th><?php echo $form['subtitulo_id']->renderLabel() ?></th>
                <td>
                    <?php echo $form['subtitulo_id']->renderError() ?>
                    <div id="subtitulos_select_id"> 
                        <select id="subtitulosx_mov_subtitulo_id"><option value="">-Seleccionar Titulo-</option></select>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</form>
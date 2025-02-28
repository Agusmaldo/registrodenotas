<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_helper('jQuery')?>


<?php echo jq_form_remote_tag(array(
                        'update' => 'subtAdm',
                        'url' => url_for('subtitulo/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')),
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
            &nbsp;<?php echo link_to('Borrar', 'subtitulo/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Agregar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['titulo_id']->renderLabel() ?></th>
        <td>
          <?php if ($form['titulo_id']->hasError()): ?>
               <div class="ui-state-error">
                  <?php echo $form['titulo_id']->renderError() ?>
          <?php endif; ?>

               <?php echo $form['titulo_id'] ?>

          <?php if ($form['titulo_id']->hasError()): ?>
               </div>
          <?php endif; ?>
        </td>
        <th>Subtitulo</th>
        <td>
          <?php if ($form['descripcion']->hasError()): ?>
               <div class="ui-state-error">
                  <?php echo $form['descripcion']->renderError() ?>
          <?php endif; ?>

               <?php echo $form['descripcion'] ?>

          <?php if ($form['descripcion']->hasError()): ?>
               </div>
          <?php endif; ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>

<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php echo jq_form_remote_tag(array(
                        'update' => 'destiRemiAdm',
                        'url' => url_for('destiRemi/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')),
                      )) ?>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <input type="submit" value="Agregar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['descripcion']->renderLabel() ?></th>
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

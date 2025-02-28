<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php echo jq_form_remote_tag(array(
                        'update' => 'responsablesAdm',
                        'url' => url_for('responsable/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')),
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
        <th><?php echo $form['usuario_id']->renderLabel() ?></th>
        <td>
          <?php if ($form['usuario_id']->hasError()): ?>
               <div class="ui-state-error">
                  <?php echo $form['usuario_id']->renderError() ?>
          <?php endif; ?>

               <?php echo $form['usuario_id'] ?>

          <?php if ($form['usuario_id']->hasError()): ?>
               </div>
          <?php endif; ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>

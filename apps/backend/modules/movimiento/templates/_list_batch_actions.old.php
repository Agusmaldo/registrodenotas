<li class="sf_admin_batch_actions_choice">
  <select name="batch_action">
    <option value=""><?php echo __('Elegir una acción', array(), 'sf_admin') ?></option>
          <option value="batchDelete"><?php echo __('Eliminar', array(), 'sf_admin') ?></option>      </select>
  <?php $form = new sfForm(); if ($form->isCSRFProtected()): ?>
    <input type="hidden" name="<?php echo $form->getCSRFFieldName() ?>" value="<?php echo $form->getCSRFToken() ?>" />
  <?php endif; ?>

  <!--<input type="submit" value="<?php echo __('OK', array(), 'sf_admin') ?>" class="fg-button ui-state-default ui-corner-right"/>-->
  <input type="submit" value="<?php echo __('OK', array(), 'sf_admin') ?>" class="ui-button ui-state-default ui-corner-all"/>
  <!--<button type="submit" class="fg-button ui-state-default fg-button-icon-right ui-corner-all">
    <span class="ui-icon ui-icon-check"></span>
    <?php echo __('OK', array(), 'sf_admin') ?>
  </button>-->
</li>

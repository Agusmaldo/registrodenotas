<ul class="sf_admin_actions_form">
  <?php echo $helper->linkToList(array(  'params' => 'class= fg-button ui-state-default fg-button-icon-left ',  'class_suffix' => 'list',  'label' => 'Volver a la búsqueda',  'ui-icon' => '',)) ?> 
  <?php if( $sf_user->hasCredential('Administrador') || $sf_user->hasCredential('CargaLectura') || $sf_user->hasCredential('SoloLectura')):?>
    <?php echo $helper->linkToEdit($movimiento, array(  'params' => 'class= fg-button ui-state-default fg-button-icon-left ',  'class_suffix' => 'edit',  'label' => 'Editar',  'ui-icon' => '',)) ?>
    <?php if( $sf_user->hasCredential('Administrador')) echo $helper->linkToDelete($form->getObject(), array(  'params' => 'class= fg-button ui-state-default fg-button-icon-left ',  'confirm' => '¿Está seguro?',  'class_suffix' => 'delete',  'label' => 'Eliminar',  'ui-icon' => '',)) ?>
  <?php else:?>
    <br/>
  <?php endif; ?>
</ul>
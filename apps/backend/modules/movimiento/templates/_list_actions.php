  
          <?php echo $helper->linkToNew(array(  'label' => 'Nuevo',  'params' => 'class= fg-button ui-state-default  ',  'class_suffix' => 'new',)) ?>

    
  
        <li class="sf_admin_action_excelexport fg-menu-has-icons">
            <?php if ($sf_user->hasCredential(array(  0 =>   array(    0 => 'Administrador',    1 => 'CargaLectura',  ),))): ?>
<?php echo link_to(__('CNRT Pendientes', array(), 'messages'), 'movimiento/excelexport', 'class= fg-button ui-state-default  ') ?>
<?php echo link_to(__('Trámite Pendientes', array(), 'messages'), 'movimiento/excelexport2', 'class= fg-button ui-state-default  ') ?>
<?php endif; ?>

    </li>
    
  
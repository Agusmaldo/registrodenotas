<div >

  <?php use_helper('I18N') ?>

  <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post" >
    <table style='margin:auto'>
      <tbody>
      <br><br>
        <?php echo $form ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2">
          <br><br>

            <input type="submit" value="<?php echo __('Ingresar', null, 'sf_guard') ?>" />
            
            <?php $routes = $sf_context->getRouting()->getRoutes() ?>
            <?php if (isset($routes['sf_guard_forgot_password'])): ?>
              <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Olvidaste la contraseña?', null, 'sf_guard') ?></a>
            <?php endif; ?>

            <?php if (isset($routes['sf_guard_register'])): ?>
              &nbsp; <a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Registrate', null, 'sf_guard') ?></a>
            <?php endif; ?>
          </td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
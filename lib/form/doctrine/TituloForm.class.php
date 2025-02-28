<?php

/**
 * Titulo form.
 *
 * @package    ferro05
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TituloForm extends BaseTituloForm
{
  public function configure()
  {
      $this->widgetSchema['descripcion']->addOption('order_by',array('descripcion','asc'));
  }
}

<?php

/**
 * Subtitulo form.
 *
 * @package    ferro05
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SubtituloForm extends BaseSubtituloForm
{
  public function configure()
  {
      $this->widgetSchema['titulo_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Titulo'), 'add_empty' => true));
      $this->widgetSchema['titulo_id']->addOption('order_by',array('descripcion','asc'));
  }
}

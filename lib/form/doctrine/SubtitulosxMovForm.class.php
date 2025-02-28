<?php

/**
 * SubtitulosxMov form.
 *
 * @package    ferro05
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SubtitulosxMovForm extends BaseSubtitulosxMovForm
{
  public function configure()
  {
   $this->setWidgets(array(
     'movimiento_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Movimiento'))),
     'subtitulo_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Subtitulo'))),
   ));
      
   $this->widgetSchema->setLabels(array(
     'movimiento_id' => 'Movimiento',
     'subtitulo_id'  => 'Subtitulo'
   ));
                
    $this->widgetSchema['movimiento_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['subtitulo_id'] = new sfWidgetFormChoice(array('choices' => array()));

    
    $this->setValidators(array(
      'movimiento_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Movimiento'))),
      'subtitulo_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Subtitulo'))),
    ));
  }
}

<?php

/**
 * SubtitulosxMov form base class.
 *
 * @method SubtitulosxMov getObject() Returns the current form's model object
 *
 * @package    ferro05
 * @subpackage form
 * @author     Matias Ezequiel Duarte
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSubtitulosxMovForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'movimiento_id' => new sfWidgetFormInputHidden(),
      'subtitulo_id'  => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'movimiento_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('movimiento_id')), 'empty_value' => $this->getObject()->get('movimiento_id'), 'required' => false)),
      'subtitulo_id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('subtitulo_id')), 'empty_value' => $this->getObject()->get('subtitulo_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('subtitulosx_mov[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SubtitulosxMov';
  }

}

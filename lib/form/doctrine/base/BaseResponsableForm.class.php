<?php

/**
 * Responsable form base class.
 *
 * @method Responsable getObject() Returns the current form's model object
 *
 * @package    ferro05
 * @subpackage form
 * @author     Matias Ezequiel Duarte
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseResponsableForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'usuario_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'usuario_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'))),
    ));

    $this->widgetSchema->setNameFormat('responsable[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Responsable';
  }

}

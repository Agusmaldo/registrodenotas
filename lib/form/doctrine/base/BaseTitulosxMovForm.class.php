<?php

/**
 * TitulosxMov form base class.
 *
 * @method TitulosxMov getObject() Returns the current form's model object
 *
 * @package    ferro05
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTitulosxMovForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'movimiento_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Movimiento'), 'add_empty' => false)),
      'subtitulo_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Subtitulo'), 'add_empty' => false)),
      'titulo_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Titulo'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'movimiento_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Movimiento'))),
      'subtitulo_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Subtitulo'))),
      'titulo_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Titulo'))),
    ));

    $this->widgetSchema->setNameFormat('titulosx_mov[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TitulosxMov';
  }

}

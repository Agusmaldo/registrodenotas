<?php

/**
 * Subtitulo form base class.
 *
 * @method Subtitulo getObject() Returns the current form's model object
 *
 * @package    ferro05
 * @subpackage form
 * @author     Matias Ezequiel Duarte
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSubtituloForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'descripcion' => new sfWidgetFormInputText(),
      'titulo_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Titulo'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 50)),
      'titulo_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Titulo'))),
    ));

    $this->widgetSchema->setNameFormat('subtitulo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Subtitulo';
  }

}

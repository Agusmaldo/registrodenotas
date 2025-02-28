<?php

/**
 * Subtitulo filter form base class.
 *
 * @package    ferro05
 * @subpackage filter
 * @author     Matias Ezequiel Duarte
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSubtituloFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    // $this->setWidgets(array(
    //   'descripcion' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    //   'titulo_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Titulo'), 'add_empty' => true)),
    // ));

    // $this->setValidators(array(
    //   'descripcion' => new sfValidatorPass(array('required' => false)),
    //   'titulo_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Titulo'), 'column' => 'id')),
    // ));

    // $this->widgetSchema->setNameFormat('subtitulo_filters[%s]');

    // $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    // $this->setupInheritance();

    // parent::setup();
  }

  public function getModelName()
  {
    // return 'Subtitulo';
  }

  public function getFields()
  {
    // return array(
    //   'id'          => 'Number',
    //   'descripcion' => 'Text',
    //   'titulo_id'   => 'ForeignKey',
    // );
  }
}

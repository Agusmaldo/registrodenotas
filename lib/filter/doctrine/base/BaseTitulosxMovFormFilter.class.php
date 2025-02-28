<?php

/**
 * TitulosxMov filter form base class.
 *
 * @package    ferro05
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTitulosxMovFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    // $this->setWidgets(array(
    //   'movimiento_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Movimiento'), 'add_empty' => true)),
    //   'subtitulo_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Subtitulo'), 'add_empty' => true)),
    //   'titulo_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Titulo'), 'add_empty' => true)),
    // ));

    // $this->setValidators(array(
    //   'movimiento_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Movimiento'), 'column' => 'id')),
    //   'subtitulo_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Subtitulo'), 'column' => 'id')),
    //   'titulo_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Titulo'), 'column' => 'id')),
    // ));

    // $this->widgetSchema->setNameFormat('titulosx_mov_filters[%s]');

    // $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    // $this->setupInheritance();

    // parent::setup();
  }

  public function getModelName()
  {
    // return 'TitulosxMov';
  }

  public function getFields()
  {
    // return array(
    //   'id'            => 'Number',
    //   'movimiento_id' => 'ForeignKey',
    //   'subtitulo_id'  => 'ForeignKey',
    //   'titulo_id'     => 'ForeignKey',
    // );
  }
}

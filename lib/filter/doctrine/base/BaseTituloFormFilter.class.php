<?php

/**
 * Titulo filter form base class.
 *
 * @package    ferro05
 * @subpackage filter
 * @author     Matias Ezequiel Duarte
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTituloFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    // $this->setWidgets(array(
    //   'descripcion' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    // ));

    // $this->setValidators(array(
    //   'descripcion' => new sfValidatorPass(array('required' => false)),
    // ));

    // $this->widgetSchema->setNameFormat('titulo_filters[%s]');

    // $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    // $this->setupInheritance();

    // parent::setup();
  }

  public function getModelName()
  {
    // return 'Titulo';
  }

  public function getFields()
  {
    // return array(
    //   'id'          => 'Number',
    //   'descripcion' => 'Text',
    // );
  }
}

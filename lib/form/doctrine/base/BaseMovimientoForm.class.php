<?php

/**
 * Movimiento form base class.
 *
 * @method Movimiento getObject() Returns the current form's model object
 *
 * @package    ferro05
 * @subpackage form
 * @author     Matias Ezequiel Duarte
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMovimientoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'usuario_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => false)),
      'remitente_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Remitente'), 'add_empty' => true)),
      'responsable_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Responsable'), 'add_empty' => false)),
      'destinatario_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Destinatario'), 'add_empty' => true)),
      'fecha_recepcion' => new sfWidgetFormInputText(),
      'fecha_elevacion' => new sfWidgetFormInputText(),
      'referencia_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Referencia'), 'add_empty' => true)),
      'area_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Area'), 'add_empty' => true)),
      'referencia_nro'  => new sfWidgetFormInputText(),
      'fecha_documento' => new sfWidgetFormDate(),
      'cnrt_pendiente'  => new sfWidgetFormInputCheckbox(),
      'tramite_pendiente'  => new sfWidgetFormInputCheckbox(),
      'cudap'           => new sfWidgetFormInputText(),
      'cantidad_folios' => new sfWidgetFormInputText(),
      'comentarios'     => new sfWidgetFormTextarea(),
      'vinculo_exp'     => new sfWidgetFormInputText(),
      'asunto'          => new sfWidgetFormTextarea(),
      'folio_fep'       => new sfWidgetFormInputText(),
      'folio_nca'       => new sfWidgetFormInputText(),
      'folio_fsr'       => new sfWidgetFormInputText(),
      'folio_soe'       => new sfWidgetFormInputText(),
      'folio_allc'      => new sfWidgetFormInputText(),
      'folio_allm'      => new sfWidgetFormInputText(),
      'folio_sgld'      => new sfWidgetFormInputText(),
      'folio_otros_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Folio_Otros'), 'add_empty' => true)),
      'nro_folio_otros' => new sfWidgetFormInputText(),
      'cuerpo'          => new sfWidgetFormInputText(),
      'estado_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'usuario_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'))),
      'remitente_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Remitente'), 'required' => false)),
      'responsable_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Responsable'),  'required' => false)),
      'destinatario_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Destinatario'), 'required' => false)),
      'fecha_recepcion' => new sfValidatorPass(array('required' => false)),
      'fecha_elevacion' => new sfValidatorPass(array('required' => false)),
      'area_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Area'), 'required' => false)),
      'referencia_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Referencia'), 'required' => false)),
      'referencia_nro'  => new sfValidatorInteger(array('required' => false)),
      'fecha_documento' => new sfValidatorDate(array('required' => false)),
      'cnrt_pendiente'  => new sfValidatorBoolean(),
      'tramite_pendiente'  => new sfValidatorBoolean(),
      'cudap'           => new sfValidatorString(array('max_length' => 80)),
      'cantidad_folios' => new sfValidatorInteger(array('required' => false)),
      'comentarios'     => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'vinculo_exp'     => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'asunto'          => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'folio_fep'       => new sfValidatorInteger(array('required' => false)),
      'folio_nca'       => new sfValidatorInteger(array('required' => false)),
      'folio_fsr'       => new sfValidatorInteger(array('required' => false)),
      'folio_soe'       => new sfValidatorInteger(array('required' => false)),
      'folio_allc'      => new sfValidatorInteger(array('required' => false)),
      'folio_allm'      => new sfValidatorInteger(array('required' => false)),
      'folio_sgld'      => new sfValidatorInteger(array('required' => false)),
      'folio_otros_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Folio_Otros'), 'required' => false)),
      'nro_folio_otros' => new sfValidatorInteger(array('required' => false)),
      'cuerpo'          => new sfValidatorInteger(array('required' => false)),
      'estado_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('movimiento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Movimiento';
  }

}

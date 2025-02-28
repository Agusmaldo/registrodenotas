<?php

/**
 * Movimiento filter form base class.
 *
 * @package    ferro05
 * @subpackage filter
 * @author     Matias Ezequiel Duarte
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMovimientoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuario_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => true)),
      'area_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Area'), 'add_empty' => true)),
      'estado_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'), 'add_empty' => true)),
      'remitente_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Remitente'), 'add_empty' => true)),
      'responsable_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Responsable'), 'add_empty' => true)),
      'destinatario_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Destinatario'), 'add_empty' => true)),
      'fecha_recepcion' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(array('format'=>'%day%%month%%year%')), 'to_date' => new sfWidgetFormDate(array('format'=>'%day%%month%%year%')))),
      'fecha_elevacion' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(array('format'=>'%day%%month%%year%')), 'to_date' => new sfWidgetFormDate(array('format'=>'%day%%month%%year%')))),
      'referencia_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Referencia'), 'add_empty' => true)),
      'referencia_nro'  => new sfWidgetFormFilterInput(),
      'fecha_documento' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(array('format'=>'%day%%month%%year%')), 'to_date' => new sfWidgetFormDate(array('format'=>'%day%%month%%year%')))),
      'cnrt_pendiente'  => new sfWidgetFormChoice(array('choices' => array('' => 'si o no', 1 => 'si', 0 => 'no'))),
      'cudap'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cantidad_folios' => new sfWidgetFormFilterInput(),
      'comentarios'     => new sfWidgetFormFilterInput(array('label' => 'Referencia','with_empty' => false)),
      'vinculo_exp'     => new sfWidgetFormFilterInput(),
      'asunto'          => new sfWidgetFormFilterInput(),
      'folio_fep'       => new sfWidgetFormFilterInput(),
      'folio_nca'       => new sfWidgetFormFilterInput(),
      'folio_fsr'       => new sfWidgetFormFilterInput(),
      'folio_soe'       => new sfWidgetFormFilterInput(),
      'folio_allc'      => new sfWidgetFormFilterInput(),
      'folio_allm'      => new sfWidgetFormFilterInput(),
      'folio_sgld'      => new sfWidgetFormFilterInput(),
      'folio_otros_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Folio_Otros'), 'add_empty' => true)),
      'nro_folio_otros' => new sfWidgetFormFilterInput(),
      'cuerpo'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'usuario_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Usuario'), 'column' => 'id')),
      'area_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Area'), 'column' => 'id')),
      'estado_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Estado'), 'column' => 'id')),
      'remitente_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Remitente'), 'column' => 'id')),
      'responsable_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Responsable'), 'column' => 'id')),
      'destinatario_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Destinatario'), 'column' => 'id')),
      'fecha_recepcion' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'fecha_elevacion' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'referencia_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Referencia'), 'column' => 'id')),
      'referencia_nro'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_documento' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'cnrt_pendiente'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'tramite_pendiente'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'cudap'           => new sfValidatorPass(array('required' => false)),
      'cantidad_folios' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comentarios'     => new sfValidatorPass(array('required' => false)),
      'vinculo_exp'     => new sfValidatorPass(array('required' => false)),
      'asunto'          => new sfValidatorPass(array('required' => false)),
      'folio_fep'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'folio_nca'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'folio_fsr'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'folio_soe'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'folio_allc'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'folio_allm'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'folio_sgld'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'folio_otros_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Folio_Otros'), 'column' => 'id')),
      'nro_folio_otros' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cuerpo'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('movimiento_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Movimiento';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'usuario_id'      => 'ForeignKey',
      'remitente_id'    => 'ForeignKey',
      'area_id'         => 'ForeignKey',
      'estado_id'         => 'ForeignKey',
      'responsable_id'  => 'ForeignKey',
      'destinatario_id' => 'ForeignKey',
      'fecha_recepcion' => 'Date',
      'fecha_elevacion' => 'Date',
      'referencia_id'   => 'ForeignKey',
      'referencia_nro'  => 'Number',
      'fecha_documento' => 'Date',
      'cnrt_pendiente'  => 'Boolean',
      'tramite_pendiente'  => 'Boolean',
      'cudap'           => 'Text',
      'cantidad_folios' => 'Number',
      'comentarios'     => 'Text',
      'vinculo_exp'     => 'Text',
      'asunto'          => 'Text',
      'folio_fep'       => 'Number',
      'folio_nca'       => 'Number',
      'folio_fsr'       => 'Number',
      'folio_soe'       => 'Number',
      'folio_allc'      => 'Number',
      'folio_allm'      => 'Number',
      'folio_sgld'      => 'Number',
      'folio_otros_id'  => 'ForeignKey',
      'nro_folio_otros' => 'Number',
      'cuerpo'          => 'Number',
    );
  }
}

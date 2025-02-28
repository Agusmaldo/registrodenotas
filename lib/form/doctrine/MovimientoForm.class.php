<?php

/**
 * Movimiento form.
 *
 * @package    ferro05
 * @subpackage form
 */
class MovimientoForm extends BaseMovimientoForm
{
  public function configure()
  {
    unset($this['usuario_id']);

    $this->widgetSchema['tipo_doc'] = new sfWidgetFormDoctrineChoice(array(
      'model'    => 'TipoDoc',
      'add_empty'=> ' ',  
    ));
    $this->validatorSchema['tipo_doc'] = new sfValidatorDoctrineChoice(array(
        'model'    => 'TipoDoc',
        'required' => true,
    ));


    $this->widgetSchema['dependencia'] = new sfWidgetFormDoctrineChoice(array(
        'model'    => 'Dependencia',
        'add_empty'=> ' ', 
    ));
    $this->validatorSchema['dependencia'] = new sfValidatorDoctrineChoice(array(
        'model'    => 'Dependencia',
        'required' => true,
    ));

 
    $this->widgetSchema['organismo'] = new sfWidgetFormDoctrineChoice(array(
        'model'    => 'Organismo',
        'add_empty'=> ' ', 
    ));
    $this->validatorSchema['organismo'] = new sfValidatorDoctrineChoice(array(
        'model'    => 'Organismo',
        'required' => true,
    ));


    $this->widgetSchema['entidad'] = new sfWidgetFormDoctrineChoice(array(
        'model'    => 'Entidad',
        'add_empty'=> ' ', 
    ));
    $this->validatorSchema['entidad'] = new sfValidatorDoctrineChoice(array(
        'model'    => 'Entidad',
        'required' => true,
    ));


    $this->widgetSchema['num'] = new sfWidgetFormInputText();
    $this->validatorSchema['num'] = new sfValidatorString(array(
        'required' => true,
    ));

   
    $this->widgetSchema['anio'] = new sfWidgetFormChoice(array(
        'choices' => array_combine(range(2020, 2030), range(2020, 2030)),
        'label'   => 'Año'
    ));
    $this->validatorSchema['anio'] = new sfValidatorChoice(array(
        'choices'  => range(2020, 2030),
        'required' => true,
    ));

    $this->widgetSchema['cudap'] = new sfWidgetFormInputText(array(), array('readonly' => 'readonly'));
    $this->validatorSchema['cudap'] = new sfValidatorString(array('required' => false));

    // Validador post-procesador para generar el CUDAP automáticamente
    $this->mergePostValidator(new sfValidatorCallback(array(
         'callback' => array($this, 'generarCudap')
    )));

    // Etiquetas (además de las de otros campos)
    $this->widgetSchema->setLabels(array(
      'tipo_doc'    => 'Tipo Documento',
      'num'         => 'Número',
      'anio'        => 'Año',
      'dependencia' => 'Dependencia',
      'organismo'   => 'Organismo',
      'entidad'     => 'Entidad',
      'cudap'       => 'CUDAP',
      // ... otras etiquetas ...
    ));

    // Configuración de otros campos (fechas, etc.)
    $this->widgetSchema['fecha_recepcion']->setAttribute('size', 16)->setAttribute('maxlength', 18);
    $this->widgetSchema['fecha_elevacion']->setAttribute('size', 16)->setAttribute('maxlength', 18);
    $this->widgetSchema['fecha_documento'] = new sfWidgetFormJQueryDate(array(
        'culture'      => 'ES',
        'config'       => "{firstDay: 1,
                            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo',
                                         'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre',
                                         'Diciembre']}",
        'date_widget'  => new sfWidgetFormDate(array('format'=>'%day%/%month%/%year%'))
    ));
    
  }

  public function generarCudap($validator, $values)
  {
      if (!empty($values['tipo_doc']) && !empty($values['anio']) && !empty($values['num']) &&
          !empty($values['dependencia']) && !empty($values['organismo']) && !empty($values['entidad'])) {

          // Obtener la descripción para guardar
          $tipoDocObject     = Doctrine::getTable('TipoDoc')->find($values['tipo_doc']);
          $dependenciaObject = Doctrine::getTable('Dependencia')->find($values['dependencia']);
          $organismoObject   = Doctrine::getTable('Organismo')->find($values['organismo']);
          $entidadObject     = Doctrine::getTable('Entidad')->find($values['entidad']);

          $tipoDocDesc     = $tipoDocObject ? $tipoDocObject->__toString() : $values['tipo_doc'];
          $dependenciaDesc = $dependenciaObject ? $dependenciaObject->__toString() : $values['dependencia'];
          $organismoDesc   = $organismoObject ? $organismoObject->__toString() : $values['organismo'];
          $entidadDesc     = $entidadObject ? $entidadObject->__toString() : $values['entidad'];

          // Generar el CUDAP con guiones entre cada parte
          $cudap = sprintf(
              "%s-%s-%s-%s-%s-%s",
              $tipoDocDesc,
              $values['anio'],
              $values['num'],
              $dependenciaDesc,
              $organismoDesc,
              $entidadDesc
          );

          // Asignar el valor generado al array de valores y al objeto
          $values['cudap'] = $cudap;
          $this->getObject()->setCudap($cudap);
      }

      return $values;
  }

  protected function updateDefaultsFromObject()
  {
      parent::updateDefaultsFromObject();

      if ($this->getObject()->getCudap()) {
          $parts = explode('-', $this->getObject()->getCudap());
          if (count($parts) == 6) {
              // Para tipo_doc: buscar el objeto por su descripción y asignar su id
              $tipoDocObj = Doctrine_Core::getTable('TipoDoc')->findOneByDescripcion($parts[0]);
              if ($tipoDocObj) {
                  $this->setDefault('tipo_doc', $tipoDocObj->getId());
              }
              
              // Para anio y num se asignan directamente
              $this->setDefault('anio', $parts[1]);
              $this->setDefault('num', $parts[2]);

              // Para dependencia:
              $depObj = Doctrine_Core::getTable('Dependencia')->findOneByDescripcion($parts[3]);
              if ($depObj) {
                  $this->setDefault('dependencia', $depObj->getId());
              }
              
              // Para organismo:
              $orgObj = Doctrine_Core::getTable('Organismo')->findOneByDescripcion($parts[4]);
              if ($orgObj) {
                  $this->setDefault('organismo', $orgObj->getId());
              }
              
              // Para entidad:
              $entObj = Doctrine_Core::getTable('Entidad')->findOneByDescripcion($parts[5]);
              if ($entObj) {
                  $this->setDefault('entidad', $entObj->getId());
              }
          }
      }
  }


}
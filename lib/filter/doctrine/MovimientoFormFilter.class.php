<?php

/**
 * Movimiento filter form.
 *
 * @package    ferro05
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MovimientoFormFilter extends BaseMovimientoFormFilter {

    public function configure() {
        $this->widgetSchema['titulo_id'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => 'Titulo',
                    'add_empty' => '',
                    'order_by' => array('descripcion','asc'),
                ));
        $this->widgetSchema['subtitulo_id'] = new sfWidgetFormDoctrineDependentSelect(array(
                    'model'     => 'Subtitulo', 
                    'label' => 'NMP',
                    'depends'   => 'Titulo',
                    'add_empty' => '<- Seleccione titulo ->',
                    'order_by' => array('descripcion','asc'),
        ));         
        $this->widgetSchema['cudap'] = new sfWidgetFormFilterInput(array(
            'label' => 'N°',
            'with_empty' => false,
        )); 
        $this->widgetSchema['destinatario_id']->addOption('order_by',array('descripcion','asc'));
        $this->widgetSchema['remitente_id']->addOption('order_by',array('descripcion','asc'));
        $this->widgetSchema['area_id']->addOption('order_by',array('descripcion','asc'));
        $this->widgetSchema['estado_id']->addOption('order_by',array('descripcion','asc'));
        $this->widgetSchema['referencia_id']->addOption('order_by',array('descripcion','asc'));
        $this->widgetSchema['cudap']->addOption('order_by',array('descripcion','asc'));
        $this->widgetSchema['folio_otros_id']->addOption('order_by',array('descripcion','asc'));
        $this->widgetSchema['cnrt_pendiente']->setOption('choices', array('' => 'sí o no', 1 => 'sí', 0 => 'no')); 
        $this->validatorSchema['titulo_id'] = new sfValidatorDoctrineChoice(array(
                    'model' => 'Titulo',
		    'required'=> false,
                ));
        $this->validatorSchema['subtitulo_id'] = new sfValidatorDoctrineChoice(array(
                    'model' => 'Subtitulo',
                    'required' => false,
                ));
    }

    public function addSubtituloIdColumnQuery($query, $field, $value) {
        $alias = $query->getRootAlias();
        if ($value) {

            $q = Doctrine_Query::create()
                    ->from('SubtitulosxMov sm')
                    ->where('sm.subtitulo_id = ?', $value);

            $this->subtitulosx_movs = $q->execute();

            if (isset($this->subtitulosx_movs[0])) {
                $consulta = "";
                foreach ($this->subtitulosx_movs as $subtitulosx_mov) {
                    $movId = $subtitulosx_mov->movimiento_id;
                    $consulta = $consulta ." OR ".$alias.".id =".$movId;
                }
                $consultaf = substr($consulta, 3);
            }else
                $consultaf = "$alias.id = 0";

            $query->addWhere($consultaf);
            return $query;
        }
        
    }
    
    public function addTituloIdColumnQuery($query, $field, $value) {
        $alias = $query->getRootAlias();
        if ($value) {

            $q = Doctrine_Query::create()
                    ->from('SubtitulosxMov sm')
                    ->innerJoin('sm.Subtitulo sb ON (sm.subtitulo_id = sb.id)')
                    ->where('sb.titulo_id = ?', $value);

            $this->subtitulosx_movs = $q->execute();

            if (isset($this->subtitulosx_movs[0])) {
                $consulta = "";
                foreach ($this->subtitulosx_movs as $subtitulosx_mov) {
                    $movId = $subtitulosx_mov->movimiento_id;
                    $consulta = $consulta ." OR ".$alias.".id =".$movId;
                }
                $consultaf = substr($consulta, 3);
            }else
                $consultaf = "$alias.id = 0";

            $query->addWhere($consultaf);
            return $query;
        }
        
    }

    public function getFields() {
        $fields = parent::getFields();
        $fields['subtitulo_id'] = 'custom';
        $fields['titulo_id'] = 'custom';
        return $fields;
    }

}
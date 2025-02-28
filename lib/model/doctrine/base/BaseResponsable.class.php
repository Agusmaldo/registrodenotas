<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Responsable', 'doctrine');

/**
 * BaseResponsable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $usuario_id
 * @property sfGuardUser $Usuario
 * @property Doctrine_Collection $Movimientos
 * 
 * @method integer             getId()          Returns the current record's "id" value
 * @method integer             getUsuarioId()   Returns the current record's "usuario_id" value
 * @method sfGuardUser         getUsuario()     Returns the current record's "Usuario" value
 * @method Doctrine_Collection getMovimientos() Returns the current record's "Movimientos" collection
 * @method Responsable         setId()          Sets the current record's "id" value
 * @method Responsable         setUsuarioId()   Sets the current record's "usuario_id" value
 * @method Responsable         setUsuario()     Sets the current record's "Usuario" value
 * @method Responsable         setMovimientos() Sets the current record's "Movimientos" collection
 * 
 * @package    ferro05
 * @subpackage model
 * @author     Matias Ezequiel Duarte
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseResponsable extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('Responsables');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('usuario_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as Usuario', array(
             'local' => 'usuario_id',
             'foreign' => 'id'));

        $this->hasMany('Movimiento as Movimientos', array(
             'local' => 'id',
             'foreign' => 'responsable_id'));
    }
}
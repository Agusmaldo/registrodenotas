<?php

/**
 * Estado
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ferro05
 * @subpackage model
 * @author     NMP
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Estado extends BaseEstado
{
    public function __toString()
    {
        return is_string($this->descripcion) ? $this->descripcion : '';
    }

    public function save(Doctrine_Connection $conn = null)
    {
        if ($this->isNew()) {    
            $this->setActivo(true); // Por defecto, los nuevos estados están activos
        }

        return parent::save($conn);
    }
}

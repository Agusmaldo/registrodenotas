<?php

/**
 * area actions.
 *
 * @package    ferro05
 * @subpackage area
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class areaActions extends sfActions
{
  public function executeList(sfWebRequest $request)
  {
    $this->areas = Doctrine_Core::getTable('Area')
        ->createQuery('a')
        ->orderBy('descripcion')
        ->execute();
            
    return $this->renderPartial('area/list', array('areas' => $this->areas));
  }
  public function executeEliminar(sfWebRequest $request)
  {
      $q = Doctrine_Query::create()
        ->from('Area')
        ->where('NOT EXISTS (SELECT * FROM Movimiento m
                    WHERE m.area_id = Area.id)');
 
      $this->areaEliminables = $q->execute();
    
      return $this->renderPartial('area/areaEliminables', array('areaEliminables' => $this->areaEliminables));
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AreaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    $this->form = new AreaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeDelete(sfWebRequest $request)
  {
    //$request->checkCSRFProtection();
    $this->forward404Unless($area = Doctrine_Core::getTable('Area')->find(array($request->getParameter('id'))), sprintf('Object area does not exist (%s).', $request->getParameter('id')));
    $area->delete();
    
    $this->getUser()->setFlash('notice', sprintf('Se ha eliminado %s de areas ', $area->get('descripcion')));

    $this->redirect('area/new');
  }
  
  public function executeActivar(sfWebRequest $request)
  {
      //$request->checkCSRFProtection();
    $this->forward404Unless($area = Doctrine_Core::getTable('Area')->find(array($request->getParameter('id'))), sprintf('Object area does not exist (%s).', $request->getParameter('id')));
    
    $q=Doctrine_Query::create()
        ->update('area r')
        ->set('r.inactivo', '?', false)
        ->where('r.id = ?', $request->getParameter('id'))
        ->execute();
     
     $this->redirect('area/list');
 
  }
  
  public function executeDesactivar(sfWebRequest $request)
  {
       //$request->checkCSRFProtection();
    $this->forward404Unless($area = Doctrine_Core::getTable('Area')->find(array($request->getParameter('id'))), sprintf('Object area does not exist (%s).', $request->getParameter('id')));
    
    $q=Doctrine_Query::create()
        ->update('area r')
        ->set('r.inactivo', '?', true)
        ->where('r.id = ?', $request->getParameter('id'))
        ->execute();
     
     $this->redirect('area/list');
  }
  

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $area = $form->save();
      
      $this->getUser()->setFlash('notice', sprintf('Se ha agregado exitosamente %s a areas ', $form->getObject()->getDescripcion()));

      $this->redirect('area/new');
    }
  }
}

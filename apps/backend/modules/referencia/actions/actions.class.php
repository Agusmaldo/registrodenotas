<?php

/**
 * referencia actions.
 *
 * @package    ferro05
 * @subpackage referencia
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class referenciaActions extends sfActions
{
  public function executeList(sfWebRequest $request)
  {
    $this->referencias = Doctrine_Core::getTable('Referencia')
        ->createQuery('a')
        ->orderBy('descripcion')
        ->execute();
            
    return $this->renderPartial('referencia/list', array('referencias' => $this->referencias));
  }
  public function executeEliminar(sfWebRequest $request)
  {
      $q = Doctrine_Query::create()
        ->from('Referencia')
        ->where('NOT EXISTS (SELECT * FROM Movimiento m
                    WHERE m.referencia_id = Referencia.id)');
 
      $this->refEliminables = $q->execute();
    
      return $this->renderPartial('referencia/refEliminables', array('refEliminables' => $this->refEliminables));
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ReferenciaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ReferenciaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeDelete(sfWebRequest $request)
  {
    //$request->checkCSRFProtection();
    $this->forward404Unless($referencia = Doctrine_Core::getTable('Referencia')->find(array($request->getParameter('id'))), sprintf('Object referencia does not exist (%s).', $request->getParameter('id')));
    $referencia->delete();
    
    $this->getUser()->setFlash('notice', sprintf('Se ha eliminado %s de Referencias ', $referencia->get('descripcion')));

    $this->redirect('referencia/new');
  }
  
  public function executeActivar(sfWebRequest $request)
  {
      //$request->checkCSRFProtection();
    $this->forward404Unless($referencia = Doctrine_Core::getTable('Referencia')->find(array($request->getParameter('id'))), sprintf('Object referencia does not exist (%s).', $request->getParameter('id')));
    
    $q=Doctrine_Query::create()
        ->update('referencia r')
        ->set('r.inactivo', '?', false)
        ->where('r.id = ?', $request->getParameter('id'))
        ->execute();
     
     $this->redirect('referencia/list');
 
  }
  
  public function executeDesactivar(sfWebRequest $request)
  {
       //$request->checkCSRFProtection();
    $this->forward404Unless($referencia = Doctrine_Core::getTable('Referencia')->find(array($request->getParameter('id'))), sprintf('Object referencia does not exist (%s).', $request->getParameter('id')));
    
    $q=Doctrine_Query::create()
        ->update('referencia r')
        ->set('r.inactivo', '?', true)
        ->where('r.id = ?', $request->getParameter('id'))
        ->execute();
     
     $this->redirect('referencia/list');
  }
  

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $referencia = $form->save();
      
      $this->getUser()->setFlash('notice', sprintf('Se ha agregado exitosamente %s a Referencias ', $form->getObject()->getDescripcion()));

      $this->redirect('referencia/new');
    }
  }
}

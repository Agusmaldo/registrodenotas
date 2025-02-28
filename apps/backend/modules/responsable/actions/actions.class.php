<?php

/**
 * responsable actions.
 *
 * @package    ferro05
 * @subpackage responsable
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class responsableActions extends sfActions
{
  public function executeList(sfWebRequest $request)
  {
    $this->responsables = Doctrine_Core::getTable('Responsable')
        ->createQuery('a')
        ->execute();
            
    return $this->renderPartial('responsable/list', array('responsables' => $this->responsables));
  }
  public function executeEliminar(sfWebRequest $request)
  {
      $q = Doctrine_Query::create()
        ->from('Responsable')
        ->where('NOT EXISTS (SELECT * FROM Movimiento m
                    WHERE m.responsable_id = Responsable.id)');
 
      $this->respEliminables = $q->execute();
    
      return $this->renderPartial('responsable/respEliminables', array('respEliminables' => $this->respEliminables));
  }
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ResponsableForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ResponsableForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeDelete(sfWebRequest $request)
  {
    //$request->checkCSRFProtection();
    $this->forward404Unless($responsable = Doctrine_Core::getTable('Responsable')->find(array($request->getParameter('id'))), sprintf('Object responsable does not exist (%s).', $request->getParameter('id')));
    $responsable->delete();
    
    $this->getUser()->setFlash('notice', sprintf('Se ha eliminado a %s de Responsables ', $responsable->get('Usuario')));

    $this->redirect('responsable/new');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $responsable = $form->save();
      
      $this->getUser()->setFlash('notice', sprintf('Se ha agregado exitosamente a %s a Responsables ', $form->getObject()->getUsuario()));

      $this->redirect('responsable/new');
    }
  }
}

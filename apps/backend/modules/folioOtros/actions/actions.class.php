<?php

/**
 * folioOtros actions.
 *
 * @package    ferro05
 * @subpackage folioOtros
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class folioOtrosActions extends sfActions
{
  public function executeList(sfWebRequest $request)
  {
    $this->folioOtros = Doctrine_Core::getTable('Folio_Otros')
        ->createQuery('a')
        ->orderBy('descripcion')
        ->execute();
            
    return $this->renderPartial('folioOtros/list', array('folioOtros' => $this->folioOtros));
  }
  public function executeEliminar(sfWebRequest $request)
  {
      $q = Doctrine_Query::create()
        ->from('Folio_Otros')
        ->where('NOT EXISTS (SELECT * FROM Movimiento m
                    WHERE m.folio_otros_id = Folio_Otros.id)');
 
      $this->foEliminables = $q->execute();
    
      return $this->renderPartial('folioOtros/foEliminables', array('foEliminables' => $this->foEliminables));
  }
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new Folio_OtrosForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new Folio_OtrosForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeDelete(sfWebRequest $request)
  {
    //$request->checkCSRFProtection();
    $this->forward404Unless($folio_otros = Doctrine_Core::getTable('Folio_Otros')->find(array($request->getParameter('id'))), sprintf('Object folio_otros does not exist (%s).', $request->getParameter('id')));
    $folio_otros->delete();
    
    $this->getUser()->setFlash('notice', sprintf('Se ha eliminado %s de Folios(Otros) ', $folio_otros->get('descripcion')));

    $this->redirect('folioOtros/new');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $folio_otros = $form->save();
      
      $this->getUser()->setFlash('notice', sprintf('Se ha agregado exitosamente %s a Folios(otros) ', $form->getObject()->getDescripcion()));

      $this->redirect('folioOtros/new');
    }
  }
}

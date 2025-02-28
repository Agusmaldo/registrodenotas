<?php

/**
 * destiRemi actions.
 *
 * @package    ferro05
 * @subpackage destiRemi
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class destiRemiActions extends sfActions
{
  public function executeList(sfWebRequest $request)
  {
    $this->desti_remis = Doctrine_Core::getTable('Desti_Remi')
        ->createQuery('a')
        ->orderBy('descripcion')
        ->execute();
            
    return $this->renderPartial('destiRemi/list', array('desti_remis' => $this->desti_remis));
  }
  public function executeEliminar(sfWebRequest $request)
  {      
   /*   $q = Doctrine_Query::create()
        ->select('Desti_Remi.*')
        ->from('Desti_Remi')        
        ->where('NOT EXISTS (SELECT * FROM Movimiento
                    WHERE Movimiento.destinatario_id = Desti_Remi.id )
                 AND NOT EXISTS (SELECT * FROM Movimiento
                    WHERE Movimiento.remitente_id = Desti_Remi.id )');
 */
      $q = Doctrine_Query::create()
        ->from('Desti_Remi')
        ->where('NOT EXISTS (SELECT * FROM Movimiento m
                    WHERE m.destinatario_id = Desti_Remi.id)
  AND NOT EXISTS (SELECT * FROM Movimiento mo
                    WHERE mo.remitente_id = Desti_Remi.id)');
      
      $this->destiRemiEliminables = $q->execute(); 
    
      return $this->renderPartial('destiRemi/destiRemiEliminables', array('destiRemiEliminables' => $this->destiRemiEliminables));
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new Desti_RemiForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new Desti_RemiForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeDelete(sfWebRequest $request)
  {
    //$request->checkCSRFProtection();
    $this->forward404Unless($desti_remi = Doctrine_Core::getTable('Desti_Remi')->find(array($request->getParameter('id'))), sprintf('Object desti_remi does not exist (%s).', $request->getParameter('id')));
    $desti_remi->delete();
    
    $this->getUser()->setFlash('notice', sprintf('Se ha eliminado %s de Destinatarios/Remitentes ', $desti_remi->get('descripcion')));

    $this->redirect('destiRemi/new');
  }
  
  public function executeActivar(sfWebRequest $request)
  {
      //$request->checkCSRFProtection();
    $this->forward404Unless($destiRemi = Doctrine_Core::getTable('Desti_Remi')->find(array($request->getParameter('id'))), sprintf('Object destiRemi does not exist (%s).', $request->getParameter('id')));
    
    $q=Doctrine_Query::create()
        ->update('Desti_Remi r')
        ->set('r.inactivo', '?', false)
        ->where('r.id = ?', $request->getParameter('id'))
        ->execute();
     
     $this->redirect('destiRemi/list');
 
  }
  
  public function executeDesactivar(sfWebRequest $request)
  {
       //$request->checkCSRFProtection();
    $this->forward404Unless($destiRemi = Doctrine_Core::getTable('Desti_Remi')->find(array($request->getParameter('id'))), sprintf('Object destiRemi does not exist (%s).', $request->getParameter('id')));
    
    $q=Doctrine_Query::create()
        ->update('Desti_Remi r')
        ->set('r.inactivo', '?', true)
        ->where('r.id = ?', $request->getParameter('id'))
        ->execute();
     
     $this->redirect('destiRemi/list');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $desti_remi = $form->save();
      
      $this->getUser()->setFlash('notice', sprintf('Se ha agregado exitosamente %s a Destinatarios/Remitentes ', $form->getObject()->getDescripcion()));

      $this->redirect('destiRemi/new');
    }
  }
}

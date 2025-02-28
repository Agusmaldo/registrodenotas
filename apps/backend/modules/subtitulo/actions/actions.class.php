<?php

/**
 * subtitulo actions.
 *
 * @package    ferro05
 * @subpackage subtitulo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class subtituloActions extends sfActions
{
  public function executeList(sfWebRequest $request)
  {
      $this->subtitulos = Doctrine_Core::getTable('Subtitulo')
        ->createQuery('a')
        ->execute();
            
      return $this->renderPartial('subtitulo/list', array('subtitulos' => $this->subtitulos));   
  }
  public function executeEliminar(sfWebRequest $request)
  {
      $q = Doctrine_Query::create()
        ->from('Subtitulo')
        ->where('id not in (select  distinct subtitulo_id from SubtitulosxMov)');
      $this->subtEliminables = $q->execute();
    
        return $this->renderPartial('subtitulo/subtEliminables', array('subtEliminables' => $this->subtEliminables));
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new SubtituloForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SubtituloForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeDelete(sfWebRequest $request)
  {
    //$request->checkCSRFProtection();
    $this->forward404Unless($subtitulo = Doctrine_Core::getTable('Subtitulo')->find(array($request->getParameter('id'))), sprintf('Object subtitulo does not exist (%s).', $request->getParameter('id')));
    $subtitulo->delete();
    
    $this->getUser()->setFlash('notice', sprintf('Se ha eliminado %s de %s ', $subtitulo->get('descripcion'), $subtitulo->get('Titulo')));

    $this->redirect('subtitulo/new'); 
    
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $subtitulo = $form->save(); 
      
      $this->getUser()->setFlash('notice', sprintf('Se ha agregado exitosamente %s a %s', $form->getObject()->getDescripcion(), $form->getObject()->getTitulo()));
      
      $this->redirect('subtitulo/new');  
    }    
    }
  
}

<?php

/**
 * titulo actions.
 *
 * @package    ferro05
 * @subpackage titulo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tituloActions extends sfActions
{
  public function executeList(sfWebRequest $request)
  {
    $this->titulos = Doctrine_Core::getTable('Titulo')
        ->createQuery('a')
        ->orderBy('descripcion')
        ->execute();
            
    return $this->renderPartial('titulo/list', array('titulos' => $this->titulos));
  }
  
  public function executeEliminar(sfWebRequest $request)
  {
      $q = Doctrine_Query::create()
        ->from('Titulo')
        ->where('NOT EXISTS (SELECT * FROM Subtitulo s
                    WHERE s.titulo_id = Titulo.id)');
 
      $this->titEliminables = $q->execute();
    
      return $this->renderPartial('titulo/titEliminables', array('titEliminables' => $this->titEliminables));
  }
  
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TituloForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TituloForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeDelete(sfWebRequest $request)
  {
    //$request->checkCSRFProtection();
    $this->forward404Unless($titulo = Doctrine_Core::getTable('Titulo')->find(array($request->getParameter('id'))), sprintf('Object titulo does not exist (%s).', $request->getParameter('id')));
    $titulo->delete();
    
    $this->getUser()->setFlash('notice', sprintf('Se ha eliminado %s de Titulos', $titulo->get('descripcion')));

    $this->redirect('titulo/new');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $titulo = $form->save();
      
      $this->getUser()->setFlash('notice', sprintf('Se ha agregado exitosamente %s a Titulos ', $form->getObject()->getDescripcion()));

      $this->redirect('titulo/new');
    }
  }
}

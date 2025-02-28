<?php

/**
 * titSubt actions.
 *
 * @package    ferro05
 * @subpackage titSubt
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class titSubtActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {   
    $q = Doctrine_Query::create()
    ->from('SubtitulosxMov sm')
    ->where('sm.movimiento_id = ?', $request->getParameter('movimiento_id_parent'));
    
    $this->subtitulosx_movs = $q->execute();
  }
  
  public function executeUpdateSubt(sfWebRequest $request)
  {
    $q = Doctrine_Query::create()
    ->from('Subtitulo s')
    ->where('s.titulo_id = ?', $request->getParameter('titulo_id'))
    ->addOrderBy('descripcion');
    
    $this->subtitulos = $q->execute();
  }

  public function executeNew(sfWebRequest $request)
  {    
    $this->form = new SubtitulosxMovForm();
    $this->form_aux = new SubtituloForm();
    $this->movimiento_id_parent = $request->getParameter('movimiento_id');
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SubtitulosxMovForm();
    
    $this->form_aux = new SubtituloForm();    
            
    $this->movimiento_id_parent = $request->getParameter('movimiento_id_parent');

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($subtitulosx_mov = Doctrine_Core::getTable('SubtitulosxMov')->find(array($request->getParameter('movimiento_id'),
              $request->getParameter('subtitulo_id'))), sprintf('Object subtitulosx_mov does not exist (%s).', $request->getParameter('movimiento_id'),
              $request->getParameter('subtitulo_id')));
    $this->form = new SubtitulosxMovForm($subtitulosx_mov);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($subtitulosx_mov = Doctrine_Core::getTable('SubtitulosxMov')->find(array($request->getParameter('movimiento_id'),
              $request->getParameter('subtitulo_id'))), sprintf('Object subtitulosx_mov does not exist (%s).', $request->getParameter('movimiento_id'),
              $request->getParameter('subtitulo_id')));
    $this->form = new SubtitulosxMovForm($subtitulosx_mov);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
   // $request->checkCSRFProtection();

    $this->forward404Unless($subtitulosx_mov = Doctrine_Core::getTable('SubtitulosxMov')->find(array($request->getParameter('movimiento_id'),
              $request->getParameter('subtitulo_id'))), sprintf('Object subtitulosx_mov does not exist (%s).', $request->getParameter('movimiento_id'),
              $request->getParameter('subtitulo_id')));
    $subtitulosx_mov->delete();
    
    
    if ($request->isXmlHttpRequest())
    {        
        $q = Doctrine_Query::create()
            ->from('SubtitulosxMov sm')
            ->where('sm.movimiento_id = ?', $request->getParameter('movimiento_id'));    
            $subtitulosx_movs = $q->execute();
            
        return $this->renderPartial('titSubt/list', array('subtitulosx_movs' => $subtitulosx_movs));
    }
    else{
      $this->redirect('titSubt/index');  
    }    
  }

  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $subtitulosx_mov = $form->save();

    if ($request->isXmlHttpRequest())
    {        
         $q = Doctrine_Query::create()
            ->from('SubtitulosxMov sm')
            ->where('sm.movimiento_id = ?', $form->getValue('movimiento_id'));    
            $subtitulosx_movs = $q->execute();
            
        return $this->renderPartial('titSubt/list', array('subtitulosx_movs' => $subtitulosx_movs));
    }
    else{
      $this->redirect('titSubt/index');  
    }   
    }
  }
  
  
}

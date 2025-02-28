<?php

/**
 * ingresoDatos2 actions.
 *
 * @package    ferro05
 * @subpackage ingresoDatos2
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 * - CLASE COMENTADA TICKET 8269.-
 */
// class ingresoDatos2Actions extends sfActions
// {
//   public function executeIndex(sfWebRequest $request)
//   {
//     $user=$this->getUser();
//     $this->forwardUnless(($user->hasCredential('Administrador'))||($user->hasCredential('Archivador')),'movimiento', 'index');
      
//     $q = Doctrine_Query::create()
//     ->from('movimiento m')
//     ->innerJoin('m.Responsable r')
//     ->where('r.usuario_id = ?', sfContext::getInstance()->getUser()->getGuardUser()->getId())
//     ->andWhere('m.vinculo_exp = ?',"")
//     ->andWhere('m.asunto = ?',"")
//     ->limit(100);
 
//     $this->movimientosPendientes = $q->execute();
    
//     $W = Doctrine_Query::create()
//     ->from('movimiento mo')            
//     ->innerJoin('mo.Responsable ro')
//     ->where('ro.usuario_id = ?', sfContext::getInstance()->getUser()->getGuardUser()->getId())
//     ->andwhere('asunto != "" or vinculo_exp != ""')
//     ->limit(100);
 
//     $this->movimientos = $W->execute();  
    
//   }

//   public function executeEdit(sfWebRequest $request)
//   {
//     $user=$this->getUser();
//     $this->forwardUnless(($user->hasCredential('Administrador'))||($user->hasCredential('Archivador')),'movimiento', 'index');
    
//     $this->forward404Unless($movimiento = Doctrine_Core::getTable('movimiento')->find(array($request->getParameter('id'))), sprintf('Object movimiento does not exist (%s).', $request->getParameter('id')));
//     $this->form = new movimientoForm($movimiento);
//   }

//   public function executeUpdate(sfWebRequest $request)
//   {
//     $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
//     $this->forward404Unless($movimiento = Doctrine_Core::getTable('movimiento')->find(array($request->getParameter('id'))), sprintf('Object movimiento does not exist (%s).', $request->getParameter('id')));
//     $this->form = new movimientoForm($movimiento);    

//     $this->processForm($request, $this->form);

//     $this->setTemplate('edit');
//   }

//   protected function processForm(sfWebRequest $request, sfForm $form)
//   {
//     $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
//     if ($form->isValid())
//     {
//       $movimiento = $form->save();
      
//       $this->getUser()->setFlash('notice', sprintf('El movimiento %s ha sido guardado exitosamente', $form->getObject()->getCudap()));
      
//       $this->redirect('ingresoDatos2/index');
//     }
//     else
//       $this->getUser()->setFlash('error', sprintf('El movimiento %s no ha podido ser guardado exitosamente', $form->getObject()->getCudap()));
//   }
  
//   public function executeCancelarForm()
//   {    
//     return $this->renderText("");
//   }
// }

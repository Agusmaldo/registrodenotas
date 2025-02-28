<?php

// require_once(dirname(__FILE__).'/../lib/ingresoDatosHelper.class.php');

/**
 * ingresoDatos1 actions.
 *
 * @package    ferro05
 * @subpackage ingresoDatos1
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ingresoDatos1Actions extends sfActions
{  
  public function executeIndex(sfWebRequest $request)
  { 
    // $user=$this->getUser();
    // $this->forwardUnless(($user->hasCredential('Administrador'))||($user->hasCredential('CargaLectura')),'movimiento', 'index');
      
    $q = Doctrine_Query::create()
    ->from('movimiento m')
    ->where('m.usuario_id = ?', sfContext::getInstance()->getUser()->getGuardUser()->getId())
    ->andWhere('m.vinculo_exp = ?',"")
    ->andWhere('m.asunto = ?',"")
    ->limit(100);
 
   $this->movimientos = $q->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $user=$this->getUser();
    $this->forwardUnless(($user->hasCredential('Administrador'))||($user->hasCredential('CargaLectura')),'movimiento', 'index');
    
    $this->form = new movimientoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new movimientoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $user=$this->getUser();
    $this->forwardUnless(($user->hasCredential('Administrador'))||($user->hasCredential('CargaLectura')),'movimiento', 'index');
    
    $this->forward404Unless($movimiento = Doctrine_Core::getTable('movimiento')->find(array($request->getParameter('id'))), sprintf('Object movimiento does not exist (%s).', $request->getParameter('id')));
    $this->form = new movimientoForm($movimiento);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($movimiento = Doctrine_Core::getTable('movimiento')->find(array($request->getParameter('id'))), sprintf('Object movimiento does not exist (%s).', $request->getParameter('id')));
    $this->form = new movimientoForm($movimiento);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    //$request->checkCSRFProtection();

    $this->forward404Unless($movimiento = Doctrine_Core::getTable('movimiento')->find(array($request->getParameter('id'))), sprintf('Object movimiento does not exist (%s).', $request->getParameter('id')));
    $movimiento ->delete();
    
    $this->getUser()->setFlash('notice', sprintf('El movimiento %s ha sido borrado exitosamente', $movimiento->get('cudap')));

    $this->redirect('ingresoDatos1/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $movimiento = $form->save();
      
      $this->getUser()->setFlash('notice', sprintf('El movimiento %s ha sido guardado exitosamente', $form->getObject()->getCudap()));

      $this->redirect('ingresoDatos1/index');
    }else {
      $errorMessages = [];

      foreach ($form->getErrorSchema() as $field => $error) {
          error_log("Error en campo '$field': " . $error->getMessage());
          $errorMessages[] = "$field: " . $error->getMessage();
      }

      // Guardar todos los errores en un solo mensaje
      $this->getUser()->setFlash('error', sprintf(
          'El movimiento %s no ha podido ser guardado exitosamente. Errores: %s',
          $form->getObject()->getCudap(),
          implode(", ", $errorMessages)
      ));
    }
  }
}

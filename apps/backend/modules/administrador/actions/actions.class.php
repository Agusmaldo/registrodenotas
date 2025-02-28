<?php

/**
 * destiRemi actions.
 *
 * @package    ferro05
 * @subpackage destiRemi
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class administradorActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      $user=$this->getUser();
      $this->forwardUnless($user->hasCredential('Administrador'),'movimiento', 'index');
  }
}
?>

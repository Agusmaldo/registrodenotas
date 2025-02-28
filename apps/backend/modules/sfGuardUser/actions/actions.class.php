<?php
class SfGuardUserActions extends autoSfGuardUserActions{
    
   public function executeIndex(sfWebRequest $request)
  {
    $user=$this->getUser();
    $this->forwardUnless($user->hasCredential('Administrador'),'movimiento', 'index');
    
    // sorting
    if ($request->getParameter('sort'))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();

    // has filters? (usefull for activate reset button)
    $this->hasFilters = $this->getUser()->getAttribute('sfGuardUser.filters', $this->configuration->getFilterDefaults(), 'admin_module');
  }
  public function executeNew(sfWebRequest $request)
  {
    $user=$this->getUser();
    $this->forwardUnless($user->hasCredential('Administrador'),'movimiento', 'index');
    
    $this->form = $this->configuration->getForm();
    $this->sf_guard_user = $this->form->getObject();
  }
  public function executeEdit(sfWebRequest $request)
  {
    $user=$this->getUser();
    $this->forwardUnless($user->hasCredential('Administrador'),'movimiento', 'index');
    
    $this->sf_guard_user = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->sf_guard_user);
  }
  
    
}
?>

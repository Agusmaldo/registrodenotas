<?php
/**
 * movimiento actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage movimiento
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 12493 2008-10-31 14:43:26Z fabien $
 */
class MovimientoActions extends autoMovimientoActions 
{
  public function preExecute()
  {
    $this->configuration = new movimientoGeneratorConfiguration();

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($this->getActionName())))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    $this->dispatcher->notify(new sfEvent($this, 'admin.pre_execute', array('configuration' => $this->configuration)));

    $this->helper = new movimientoGeneratorHelper();
  }

  public function executeIndex(sfWebRequest $request)
  {
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
    $this->hasFilters = $this->getUser()->getAttribute('movimiento.filters', $this->configuration->getFilterDefaults(), 'admin_module');
  }
  
  public function executeExcelexport(sfWebRequest $request)
  {
   $q = Doctrine_Query::create()
    ->from('movimiento m')
    ->where('m.cnrt_pendiente = ?',true)
    ->orderBy('m.id'); 
   $this->movimientos = $q->execute();
    
   $this->setLayout(false);
   $this->getResponse()->setContentType('application/msexcel');
   $fecha = date("d_m_Y"); // para incluir la fcha en el nombre delfichero
   $filename = "CNRT_pend_" . $fecha . ".xls"; // nombre file
   $this->getResponse()->setHttpHeader("Content-Disposition","attachment; filename=".$filename);
   $this->setTemplate('exportacion');
  }
  
  public function executeExcelexport2(sfWebRequest $request)
  {
   $q = Doctrine_Query::create()
    ->from('movimiento m')
    ->where('m.tramite_pendiente = ?',true)
    ->orderBy('m.id'); 
   $this->movimientos = $q->execute();
    
   $this->setLayout(false);
   $this->getResponse()->setContentType('application/msexcel');
   $fecha = date("d_m_Y"); // para incluir la fcha en el nombre delfichero
   $filename = "tramite_pend_" . $fecha . ".xls"; // nombre file
   $this->getResponse()->setHttpHeader("Content-Disposition","attachment; filename=".$filename);
   $this->setTemplate('exportacion');
  }

  public function executeFilter(sfWebRequest $request)
  {
    $this->setPage(1);

    if ($request->hasParameter('_reset'))
    {
      $this->setFilters($this->configuration->getFilterDefaults());

      $this->redirect('@movimiento');
    }

    $this->filters = $this->configuration->getFilterForm($this->getFilters());

    $this->filters->bind($request->getParameter($this->filters->getName()));
    if ($this->filters->isValid())
    {
      $this->setFilters($this->filters->getValues());

      $this->redirect('@movimiento');
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();

    $this->setTemplate('index');
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->redirect('ingresoDatos1/index');
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->movimiento = $this->form->getObject();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->movimiento = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->movimiento);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->movimiento = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->movimiento);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

    $this->getRoute()->getObject()->delete();

    $this->getUser()->setFlash('notice', 'El movimiento fue eliminado exitosamente');

    $this->redirect('@movimiento');
  }

  public function executeBatch(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    if (!$ids = $request->getParameter('ids'))
    {
      $this->getUser()->setFlash('error', 'Selecciona al menos un movimiento');

      $this->redirect('@movimiento');
    }

    if (!$action = $request->getParameter('batch_action'))
    {
      $this->getUser()->setFlash('error', 'Selecciona una acción para ejecutar sobre los movimientos');

      $this->redirect('@movimiento');
    }

    if (!method_exists($this, $method = 'execute'.ucfirst($action)))
    {
      throw new InvalidArgumentException(sprintf('Debes crear un metodo "%s" para la acción "%s"', $method, $action));
    }

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($action)))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    $validator = new sfValidatorDoctrineChoice(array('model' => 'Movimiento'));
    try
    {
      // validate ids
      $ids = $validator->clean($ids);

      // execute batch
      $this->$method($request);
    }
    catch (sfValidatorError $e)
    {
      $this->getUser()->setFlash('error', 'Un problema ocurrió cuando se eliminaban los movimientos seleccionados ya que algunos de ellos ya no existen');
    }

    $this->redirect('@movimiento');
  }

  protected function executeBatchDelete(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');

    $count = Doctrine_Query::create()
      ->delete()
      ->from('Movimiento')
      ->whereIn('id', $ids)
      ->execute();

    if ($count >= count($ids))
    {
      $this->getUser()->setFlash('notice', 'Los movimientos seleccionados fueron eliminados exitosamente');
    }
    else
    {
      $this->getUser()->setFlash('error', 'Ocurrió un problema cuando se eliminaban los movimientos seleccionados');
    }

    $this->redirect('@movimiento');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'El movimiento fue creado exitosamente' : 'El movimiento fue actualizado exitosamente';

      $movimiento = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $movimiento)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@movimiento_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'movimiento_edit', 'sf_subject' => $movimiento));
      }
    }
    else
    {
      $errorMessages = [];
      foreach ($form->getErrorSchema() as $field => $error) {
          $errorMessages[] = "$field: " . $error->getMessage();
      }
      $this->getUser()->setFlash('error', "Errores en el formulario: " . implode(", ", $errorMessages));
    }
  }

  protected function getFilters()
  {
    return $this->getUser()->getAttribute('movimiento.filters', $this->configuration->getFilterDefaults(), 'admin_module');
  }

  protected function setFilters(array $filters)
  {
    return $this->getUser()->setAttribute('movimiento.filters', $filters, 'admin_module');
  }

  protected function getPager()
  {
    $pager = $this->configuration->getPager('Movimiento');
    $pager->setQuery($this->buildQuery());
    $pager->setPage($this->getPage());
    $pager->init();

    return $pager;
  }

  protected function setPage($page)
  {
    $this->getUser()->setAttribute('movimiento.page', $page, 'admin_module');
  }

  protected function getPage()
  {
    return $this->getUser()->getAttribute('movimiento.page', 1, 'admin_module');
  }

  protected function buildQuery()
  {
    $tableMethod = $this->configuration->getTableMethod();
    if (is_null($this->filters))
    {
      $this->filters = $this->configuration->getFilterForm($this->getFilters());
    }

    $this->filters->setTableMethod($tableMethod);

    $query = $this->filters->buildQuery($this->getFilters());

    $this->addSortQuery($query);

    $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
    $query = $event->getReturnValue();

    return $query;
  }

  protected function addSortQuery($query)
  {
    if (array(null, null) == ($sort = $this->getSort()))
    {
      return;
    }

    $query->addOrderBy($sort[0] . ' ' . $sort[1]);
  }

  protected function getSort()
  {
    if (!is_null($sort = $this->getUser()->getAttribute('movimiento.sort', null, 'admin_module')))
    {
      return $sort;
    }

    $this->setSort($this->configuration->getDefaultSort());

    return $this->getUser()->getAttribute('movimiento.sort', null, 'admin_module');
  }

  protected function setSort(array $sort)
  {
    if (!is_null($sort[0]) && is_null($sort[1]))
    {
      $sort[1] = 'asc';
    }

    $this->getUser()->setAttribute('movimiento.sort', $sort, 'admin_module');
  }

	public function executeShow(sfWebRequest $request)
	{
	  $this->movimiento = Doctrine::getTable('Movimiento')->find($request->getParameter('id'));
	  $this->forward404Unless($this->movimiento);
	  $this->form = $this->configuration->getForm($this->movimiento);
	}


}

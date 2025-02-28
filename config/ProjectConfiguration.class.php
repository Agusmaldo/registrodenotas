<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony-1.4.15/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfDoctrineGuardPlugin');
    $this->enablePlugins('sfJqueryReloadedPlugin');
    $this->enablePlugins('sfAdminThemejRollerPlugin');
    $this->enablePlugins('pmJSCookMenuPlugin');
    $this->enablePlugins('sfFormExtraPlugin');
    $this->enablePlugins('sfDependentSelectPlugin');
  }
}

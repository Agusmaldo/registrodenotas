<?php

class backendConfiguration extends sfApplicationConfiguration
{
  public function configure()
  {
      sfValidatorBase::setDefaultMessage('required', 'Requerido');
      sfValidatorBase::setDefaultMessage('invalid', 'Inválido');
  }
}

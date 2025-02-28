<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once dirname(__FILE__).'/../bootstrap.php';
require_once dirname(__FILE__).'/../../lib/form/sfFormLanguage.class.php';

$t = new lime_test(9, new lime_output_color());

// initialize objects
$dispatcher = new sfEventDispatcher();

$sessionPath = sys_get_temp_dir().'/sessions_'.rand(11111, 99999);
$storage = new sfSessionTestStorage(array('session_path' => $sessionPath));
$user = new sfUser($dispatcher, $storage);
$user->setCulture('es');

$request = new sfWebRequest($dispatcher);

// __construct()
$t->diag('__construct()');
try
{
  new sfFormLanguage($user);
  $t->fail('__construct() throws a RuntimeException if you don\'t pass a "languages" option');
}
catch (RuntimeException $e)
{
  $t->pass('__construct() throws a RuntimeException if you don\'t pass a "languages" option');
}
$form = new sfFormLanguage($user, array('languages' => array('es','en')));
$t->is($form->getDefault('language'), 'es', '__construct() sets the default language value to the user language');
$w = $form->getWidgetSchema();
$t->is($w['language']->getOption('languages'), array('es','en'), '__construct() uses the "languages" option for the select form widget');
$v = $form->getValidatorSchema();
$t->is($v['language']->getOption('languages'), array('es','en'), '__construct() uses the "languages" option for the validator');

// ->process()
$t->diag('->process()');

// with CSRF disabled
$t->diag('with CSRF disabled');
sfForm::disableCSRFProtection();

$form = new sfFormLanguage($user, array('languages' => array('es','en')));
$request->setParameter('language','en');
$t->is($form->process($request), true, '->process() returns true if the form is valid');
$t->is($user->getCulture(),'en', '->process() changes the user culture');

$request->setParameter('language', 'es');
$t->is($form->process($request), false, '->process() returns true if the form is not valid');
$t->is($form['language']->getError()->getCode(), 'invalid', '->process() throws an error if the language is not in the languages option');

sfToolkit::clearDirectory($sessionPath);

// with CSRF enabled
$t->diag('with CSRF enabled');
sfForm::enableCSRFProtection('secret');

$form = new sfFormLanguage($user, array('languages' => array('es','en')));
$request->setParameter('language','en');
$request->setParameter('_csrf_token', $form->getCSRFToken('secret'));
$t->is($form->process($request), true, '->process() returns true if the form is valid');

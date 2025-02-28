<?php

/**
 * Base project form.
 * 
 * @package    ferro05
 * @subpackage form
 * @author     Your name here 
 * @version    SVN: $Id: BaseForm.class.php 20147 2009-07-13 11:46:57Z FabianLange $
 */
class BaseForm extends sfFormSymfony
{
}

class WidgetFormCUDAP extends sfWidgetForm
{
  protected function configure($options = array(), $attributes = array())
  {
        $this->addOption('ACTEXP', array());
        $this->addOption('S0X', array());
	$this->addOption('text', array());
	$this->addOption('anio', array());
	$this->addOption('format', '%ACTEXP%'.'-'.'%S0X%'.':'.'%text%'.'/'.'%anio%');
	parent::configure($options, $attributes);
  }

  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
       if (null !== $value)
       {
           if (false === is_array($value))
           {
                $tmp1 = explode('-', $value);
                $value = array();                
                $value['ACTEXP'] = $tmp1[0];
                
                $tmp2 = explode(':', $tmp1[1]);
                $value['S0X'] = $tmp2[0];             
                
                $tmp3 = explode('/', $tmp2[1]);
                $value['text'] = $tmp3[0];
                $value['anio'] = $tmp3[1];
           }
       }
       $text = $this->getTextWidget($attributes)->render($name.'[text]', $value['text']);
       return strtr($this->getOption('format'), array(
          '%ACTEXP%' => $this->getACTEXPWidget($attributes)->render($name.'[ACTEXP]', $value['ACTEXP']),
          '%S0X%' => $this->getS0XWidget($attributes)->render($name.'[S0X]', $value['S0X']),
          '%text%' => $text,
          '%anio%' => $this->getAnioWidget($attributes)->render($name.'[anio]', $value['anio']),
        ));
  }

  protected function getTextWidget($attributes = array())
  {
    return new sfWidgetFormInputText($this->getOptionsFor('text'), $this->getAttributesFor('text', $attributes));
  }

  protected function getACTEXPWidget($attributes = array())
  {
    return new sfWidgetFormChoice($this->getOptionsFor('ACTEXP'), $this->getAttributesFor('ACTEXP', $attributes));
  }
    protected function getS0XWidget($attributes = array())
  {
    return new sfWidgetFormChoice($this->getOptionsFor('S0X'), $this->getAttributesFor('S0X', $attributes));
  }
    protected function getAnioWidget($attributes = array())
  {
    return new sfWidgetFormChoice($this->getOptionsFor('anio'), $this->getAttributesFor('anio', $attributes));
  }

  protected function getOptionsFor($type)
  {
    $options = $this->getOption($type);
    if (!is_array($options))
    {
      throw new InvalidArgumentException(sprintf('You must pass an array for the %s option.', $type));
    }
    return $options;
  }

  protected function getAttributesFor($type, $attributes)
  {
    $defaults = isset($this->attributes[$type]) ? $this->attributes[$type] : array();
    return isset($attributes[$type]) ? array_merge($defaults, $attributes[$type]) : $defaults;
  }

}

class WidgetValidatorCUDAP extends sfValidatorBase
{
   public function configure($options = array(), $messages = array())
   {
 	parent::configure($options, $messages);
        $this->addRequiredOption('ACTEXP');
        $this->addRequiredOption('S0X');
	$this->addRequiredOption('text');
	$this->addRequiredOption('anio');
        $this->addOption('ACTEXP_field', 'ACTEXP');
        $this->addOption('S0X_field', 'S0X');
	$this->addOption('text_field', 'text');
	$this->addOption('anio_field', 'anio');
   }

  public function doClean($value)
  {
       $textField = $this->getOption('text_field');
       $ACTEXPField = $this->getOption('ACTEXP_field');
       $S0XField = $this->getOption('S0X_field');
       $anioField = $this->getOption('anio_field');
       $value[$textField] = $this->getOption('text')->clean(isset($value[$textField]) ? $value[$textField] : null);
       $value[$ACTEXPField]   =  $this->getOption('ACTEXP')->clean(isset($value[$ACTEXPField]) ? $value[$ACTEXPField] : null);
       $value[$S0XField]   =  $this->getOption('S0X')->clean(isset($value[$S0XField]) ? $value[$S0XField] : null);
       $value[$anioField]   =  $this->getOption('anio')->clean(isset($value[$anioField]) ? $value[$anioField] : null);

       if ($value[$textField] && $value[$ACTEXPField] && $value[$anioField] && $value[$S0XField])
       {
    	    return $value[$ACTEXPField].'-'.$value[$S0XField].':'.$value[$textField].'/'.$value[$anioField];
       }
       return $value;
    }
}
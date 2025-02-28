<?php

class myUser extends sfGuardSecurityUser
{	
    public function getTimedOut() 
   {
       return $this->timedout;
   }

}

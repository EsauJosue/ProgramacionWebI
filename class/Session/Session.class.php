<?php

class Session
{
    public function __construct()
    {
        session_start();
    }

    public function addValue ($key, $value)
    {
        $_SESSION[$key] = $value;

    }

    public function getValue ($key)
    {
        if($this->issetValue($key)){
           return $_SESSION[$key];
        }else
        {
            return false;

        }
    }
    public function removeValue($key)
    {
       if($this->issetValue($key))
       {
        unset($_SESSION[$key]);
       }
    }
    public function issetValue($value)
    {
        return isset($_SESSION[$value]); 
    }
    public function validateSession($key){
        if(! $this->issetValue($key))
        {
           $this->destroySession();
           return false;
        }else{
            return true;
        }
    }
    public function destroySession()
    {
        
        //liberacion de variables de sesion
        session_unset();
        //termina sesion completamente
        session_destroy();
    }
    
}





?>
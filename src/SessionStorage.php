<?php

declare(strict_types = 1);

namespace DDELIMA\PHP\DependencyInjection;

class SessionStorage
{
    /**
     * @param string $cookieName
     */
    function __construct(string $cookieName)
    {
      if(session_status() === PHP_SESSION_NONE) {
        session_name($cookieName);
        session_start();
      }
        
    }
 
    /**
     * @param mixed $key
     * @param mixed $value
     * 
     * @return void
     */
    function set($key, $value): void
    {
        $_SESSION[$key] = $value;
    }
 
    /**
     * @param mixed $key
     * 
     * @return string
     */
    function get($key): string
    {
        return $_SESSION[$key];
    }
 
}

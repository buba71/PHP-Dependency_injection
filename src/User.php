<?php

declare(strict_types = 1);

namespace DDELIMA\PHP\DependencyInjection;

class User
{
    /**
     * @var 
     */
    protected $storage;
 
    /**
     */
    function __construct($storage)
    {
        $this->storage = $storage;
    }
 
    /**
     * @param string $name
     * @param string $value
     * 
     * @return void
     */
    function setAttribute(string $name, string $value): void
    {
        $this->storage->set($name, $value);
    }
 
    /**
     * @param string $name
     * 
     * @return string
     */
    function getAttribute(string $name): string
    {
        return $this->storage->get($name);
    }
}

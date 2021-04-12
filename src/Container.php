<?php

declare(strict_types = 1);

namespace DDELIMA\PHP\DependencyInjection;

/**
 * Class Container
 */
final class Container
{
  /**
   * @var array
   */
  protected array $parameters;

  public function __construct(array $parameters)
  {
    $this->parameters = $parameters;
  }
  
  /**
   * @return User
   */
  public function getUser()
  {
    static $instance;

    if (!isset($instance)) {
      $className = $this->parameters['user.class'];
      var_dump($className);
      $instance = new $className($this->getUserStorage());
    }
    return $instance;
  }

  /**
   * @return SessionStorage
   */
  public function getUserStorage()
  {
    static $instance;

    if (!isset($instance)) {
      $className = $this->parameters['user.storage.class'];
      $instance = new $className($this->parameters['user.storage.cookie_name']);
    }
    return $instance;
  }
}
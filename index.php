<?php

declare(strict_types = 1);

use DDELIMA\PHP\DependencyInjection\Container;
use DDELIMA\PHP\DependencyInjection\utils\YamlParser;

require_once('vendor/autoload.php');


$parameters = new YamlParser();

$parameters->Parse(__DIR__ .'/parameters.yaml');

$container = new Container($parameters->getData());

// Get User instance from container.
var_dump($container->getUser());



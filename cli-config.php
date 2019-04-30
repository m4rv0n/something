<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Setup;

require_once './bootstrap.php';

$config        = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, NULL, NULL, FALSE);
$entityManager = EntityManager::create($dbParams, $config);

return ConsoleRunner::createHelperSet($entityManager);
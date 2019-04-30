<?php

namespace Framework;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\ORM\Tools\Setup;

class Model {
    /**
     * @return |null
     * @throws \Doctrine\Common\Annotations\AnnotationException
     */
    public static function getEntityManager() {
        static $entityManager = \null;

        if ($entityManager === \null) {
            $paths  = array('App\Model');
            $driver = new AnnotationDriver(new AnnotationReader(), $paths);

            $dbParams = array(
                'driver' => Configuration::DB_DRIVER,
                'user' => Configuration::DB_USER,
                'password' => Configuration::DB_PASS,
                'dbname' => Configuration::DB_NAME
            );

            $config = Setup::createAnnotationMetadataConfiguration($paths);
            $config->setMetadataDriverImpl($driver);
            $config->setProxyDir(__DIR__ . '/Proxies');
            $config->setProxyNamespace('Framework\Proxies');

            if (Configuration::DEVELOPMENT) {
                $config->setAutoGenerateProxyClasses(\TRUE);
            } else {
                $config->setAutoGenerateProxyClasses(\FALSE);
            }

            $entityManager = EntityManager::create($dbParams, $config);
        }
        return $entityManager;
    }
}
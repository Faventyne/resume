<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
require_once "../vendor/autoload.php";
// Create a simple "default" Doctrine ORM configuration for Annotations
// Dev mode ?
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "/src"),
    $isDevMode);
// or if you prefer yaml or XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"),$isDevMode);
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"),$isDevMode);
// database configuration parameters

// Configuration de l'application
$dbParams = [
    'driver'   => 'pdo_mysql',
    'dbname'   => 'serpicotest',
    'host'     => '192.168.162.162',
    'user'     => 'serpicoadmin',
    'password' => 'SerpicoAdmin',
    ];


// obtaining the entity manager
$entityManager = EntityManager::create($dbParams, $config);
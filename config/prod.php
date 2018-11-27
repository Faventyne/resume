<?php

use Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
// configure your app for the production environment

$app['twig.path'] = array(__DIR__.'/../templates');
$app['twig.options'] = array('cache' => __DIR__.'/../var/cache/twig');

$app->register(new \Silex\Provider\DoctrineServiceProvider(),
    [
        'db.options' =>
            [
                'driver' => 'pdo_mysql',
                'host' => 'wf3.progweb.fr',
                'dbname' => 'guillaumec_jobflow',
                'user' => 'guillaumec',
                'password' => 'webforce3'
            ]
    ]);

$app->register(
    new DoctrineOrmServiceProvider(),
    [
        'orm.proxies_dir' => sys_get_temp_dir(),
        'orm.em.options' => [
            'mappings' => [
                [
                    'type' => 'annotation',
                    'namespace' => 'Model',
                    'path' => __DIR__.'/../src/Model'
                ]
            ]
        ]
    ]
);
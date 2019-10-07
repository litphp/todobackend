<?php

use Lit\Air\Configurator as C;

$configuration = [];

$configuration += [
    \Doctrine\DBAL\Connection::class => C::builder([\Doctrine\DBAL\DriverManager::class, 'getConnection'], [
        [
            'url' => 'sqlite:db.sqlite3',
        ],
    ]),
    \Doctrine\ORM\EntityManagerInterface::class => C::decorateSingleton(C::builder([
        \Doctrine\ORM\EntityManager::class,
        'create',
    ], [
        C::alias(\Doctrine\ORM\EntityManager::class, 'connection'),
        C::alias(\Doctrine\ORM\EntityManager::class, 'configuration'),
    ])),
    C::join(\Doctrine\ORM\EntityManager::class, 'connection') => C::value([
        'driver' => 'pdo_sqlite',
        'path' => __DIR__ . '/db.sqlite3',
    ]),
    C::join(\Doctrine\ORM\EntityManager::class, 'configuration') => C::builder([
        \Doctrine\ORM\Tools\Setup::class,
        'createAnnotationMetadataConfiguration',
    ], [
        /**
         * @see \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration
         */
        [__DIR__ . '/src'],
        'isDevMode' => true,
        'useSimpleAnnotationReader' => false,
    ]),
];

return $configuration;

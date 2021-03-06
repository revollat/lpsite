<?php
require_once __DIR__ . '/vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\VarDumperServiceProvider());

$app->register(new Silex\Provider\SessionServiceProvider());

$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());

$app->register(new Silex\Provider\LocaleServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider());

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/templates',
));

// Doctrine 
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'host' => 'localhost', 
        'dbname' => 'livres',
        'port'     => 3306,
        'user' => 'o_revollat', 
        'charset' => 'utf8'
    ),
));

$app['livres'] = function ($app) {
    return new Lpimash\Model\Livre($app['db']);
};
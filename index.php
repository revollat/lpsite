<?php
require_once "init.php";

$app->get('/', function () use ($app)  {
        return $app['twig']->render('pages/accueil.html.twig');
});

$app->get('/hello/{name}', function ($name) use ($app) {
    return $app['twig']->render('pages/hello.html.twig', array(
        'name' => $name,
    ));
})->value('name', 'World');

$app->run();

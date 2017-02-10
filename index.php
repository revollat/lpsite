<?php
require_once "init.php";

$app->get('/', function () use ($app)  {
        return $app['twig']->render('accueil.html.twig');
});

$app->get('/hello/{name}', function ($name) use ($app) {
    return $app['twig']->render('hello.html.twig', array(
        'name' => $name,
    ));
});

$app->run();

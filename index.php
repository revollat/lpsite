<?php
require_once "init.php";

//  ==================== ACCUEIL =====================
$app->get('/', function () use ($app)  {
        return $app['twig']->render('pages/accueil.html.twig');
});

//  ==================== LIVRES ======================
$app->get('/livres', function () use ($app) {
    
    return $app['twig']->render('pages/livres.html.twig', array(
        'livres' => $app['livres']->getItems()
    ));
    
});


$app->run();

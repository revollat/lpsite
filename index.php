<?php
require_once "init.php";

//  ==================== ACCUEIL =====================
$app->get('/', function () use ($app)  {
        return $app['twig']->render('pages/accueil.html.twig');
});

//  ==================== LISTING LIVRES ===============
$app->get('/livres', function () use ($app) {
    
    return $app['twig']->render('pages/livres.html.twig', array(
        'livres' => $app['livres']->getItems()
    ));
    
});

//  ==================== DETAIL UN LIVRES =============
$app->get('/livre/{id}', function ($id) use ($app) {
    
    $livre = $app['livres']->getById($id);
    
    return $app['twig']->render('pages/livre.html.twig', array(
        'livre' => $livre
    ));
    
});

$app->run();

<?php
require_once "init.php";

use Symfony\Component\HttpFoundation\Request;
use Lpimash\Form\Contact;

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
    $commentaires = $app['livres']->getCommentairesForId($id);
    
    return $app['twig']->render('pages/livre.html.twig', array(
        'livre' => $livre,
        'commentaires' => $commentaires
    ));
    
});

// Contact
$app->match('/me-contacter', function (Request $request) use ($app) {
    
    $form = $app['form.factory']->createBuilder(Contact::class)->getForm();
    
    $form->handleRequest($request);
    if ($form->isValid()) {
        $form_data = $form->getData();
        $app['session']->getFlashBag()->add('message', 'Votre message a bien été envoyé. Vous serez recontacté sur ' . $form_data['email']);
        return $app->redirect('/site/');
    }
        
    return $app['twig']->render('pages/contact.html.twig', array('form' => $form->createView()));
    
});

$app->run();

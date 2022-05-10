<?php

use App\Router;

require '../vendor/autoload.php';

// $router = new App\Router(dirname(__DIR__));
// $router
//         ->get('/Site', '/Site/site', 'Site')
//         ->get('/Site', 'Compte/Compte', 'Compte')
//         ->run();
$router = new AltoRouter();

                                // define('VIEW_PATH', dirname(__DIR__) . '/views');

                                // $router->map('GET', '/Site', function(){
                                //         require VIEW_PATH . '/Site/site.php';
                                // });
                                // $router->map('GET', '/Compte', function(){
                                //         require VIEW_PATH . '/Compte/Compte.php';
                                // });

                                // $match = $router->match();
                                // $match['target']();


$router = new Router(dirname(__DIR__) . '/views');
$router
        ->get('/Site', 'Site/site', 'Site')
        ->get('/Site/Compte', 'Compte/Compte', 'Compte')
        ->run();

?>

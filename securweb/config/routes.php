<?php

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;


$routes->setRouteClass(DashedRoute::class);

$routes->scope('/', function (RouteBuilder $builder) {
    /*
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, templates/Pages/home.php)...
     */
    $builder->connect('/', ['controller' => 'Api', 'action' => 'index']);
    $builder->connect('/decode-csr', ['controller' => 'Api', 'action' => 'decode_csr']);
    $builder->connect('/convert-certificate', ['controller' => 'Api', 'action' => 'convert_certificate']);

    $builder->fallbacks();
});
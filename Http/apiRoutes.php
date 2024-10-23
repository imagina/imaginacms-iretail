<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/iretail/v1'], function (Router $router) {
  $router->apiCrud([
    'module' => 'iretail',
    'prefix' => 'items',
    'controller' => 'ItemApiController',
    'permission' => 'iretail.items',
    //'middleware' => ['create' => [], 'index' => [], 'show' => [], 'update' => [], 'delete' => [], 'restore' => []],
    // 'customRoutes' => [ // Include custom routes if needed
    //  [
    //    'method' => 'post', // get,post,put....
    //    'path' => '/some-path', // Route Path
    //    'uses' => 'ControllerMethodName', //Name of the controller method to use
    //    'middleware' => [] // if not set up middleware, auth:api will be the default
    //  ]
    // ]
  ]);
  $router->apiCrud([
    'module' => 'iretail',
      'prefix' => 'transactions',
      'controller' => 'TransactionApiController',
      'permission' => 'iretail.transactions',
    //'middleware' => ['create' => [], 'index' => [], 'show' => [], 'update' => [], 'delete' => [], 'restore' => []],
    // 'customRoutes' => [ // Include custom routes if needed
    //  [
    //    'method' => 'post', // get,post,put....
    //    'path' => '/some-path', // Route Path
    //    'uses' => 'ControllerMethodName', //Name of the controller method to use
    //    'middleware' => [] // if not set up middleware, auth:api will be the default
    //  ]
    // ]
  ]);
  $router->apiCrud([
    'module' => 'iretail',
    'prefix' => 'types',
    'staticEntity' => 'Modules\Iretail\Entities\Type',
    'middleware' => ['create' => [], 'index' => [], 'show' => [], 'update' => [], 'delete' => [], 'restore' => []],
    // 'customRoutes' => [ // Include custom routes if needed
    //  [
    //    'method' => 'post', // get,post,put....
    //    'path' => '/some-path', // Route Path
    //    'uses' => 'ControllerMethodName', //Name of the controller method to use
    //    'middleware' => [] // if not set up middleware, auth:api will be the default
    //  ]
    // ]
  ]);
// append


});

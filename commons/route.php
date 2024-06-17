<?php

use App\Controllers\CustomerController;
use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function () {
    if (!isset($_SESSION['auth']) || empty($_SESSION['auth'])) {
        header('location: ' . BASE_URL . 'login');
        die;
    }
});


// bắt đầu định nghĩa ra các đường dẫn
$router->get('/', [CustomerController::class, 'getCustomer']);
$router->get('add-customer', [CustomerController::class, 'addCustomer']);
$router->post('post-customer', [CustomerController::class, 'postCustomer']);
$router->get('detail-customer/{id}', [CustomerController::class, 'detailCustomer']);
$router->post('edit-customer/{id}', [CustomerController::class, 'editCustomer']);
$router->get('delete-customer/{id}', [CustomerController::class, 'deleteCustomer']);
# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;

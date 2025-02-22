<?php

/**
 * This file acts as application entry point (initializes it), sets up routing and handles requests.
 */
require_once 'Core/Router.php';
require_once 'Core/Response.php';
require_once 'Core/Controllers/VisitsController.php';
require_once 'Sources/Visits/GoogleAnalytics.php';
require_once 'Sources/Visits/PositiveGuys.php';
require_once 'Sources/Visits/AwStats.php';

// Instantiates router and controller classes
$router = new Router();
$visitsController = new VisitsController();

/*
 * Registers a route for fetching website visit stats.
 *
 * Method: GET
 * Path: /visits
 * Handler: VisitsController@getAllVisits
 */
$router->add('GET', '/visits', [$visitsController, 'getAllVisits']);

// Get request method
$method = $_SERVER['REQUEST_METHOD'];
// Parse the URI so only the path component is used (any query parameters are ignored)
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

/*
 * Executes the request and outputs the response.
 */
echo $router->run($method, $uri);

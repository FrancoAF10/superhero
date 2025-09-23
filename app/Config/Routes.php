<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/reportes/r1', 'ReporteController::getReport1');
$routes->get('/reportes/r2', 'ReporteController::getReport2');
$routes->get('/reportes/r3', 'ReporteController::getReport3');
$routes->get('/reportes/filtro', 'ReporteController::filtro');
$routes->get('/reportes/filtro/r4', 'ReporteController::getReport4');
$routes->get('/reportes/rptui', 'ReporteController::showUIReport');

//el formulario <select> enviara los datos
$routes->post('/reportes/publisher', 'ReporteController::getReportByPublisher');
$routes->post('/reportes/raceandalignment', 'ReporteController::getReportByRaceAndAlignment');

//dashboard
$routes->get('/dashboard/informe1', 'DashboardController::getInforme1');

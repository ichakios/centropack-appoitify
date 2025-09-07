<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/book-now', 'Home::book_now');
$routes->get('/dashboard', 'Home::dashboard');

// app/Config/Routes.php (snippet)
$routes->group('', function ($routes) {
    // Services
    $routes->get('services', 'Services::index');
    $routes->post('services', 'Services::create');
    $routes->get('services/(:segment)', 'Services::show/$1');
    $routes->put('services/(:segment)', 'Services::update/$1');

    // Staff
    $routes->get('staff', 'Staff::index');
    $routes->post('staff', 'Staff::create');
    $routes->put('staff/(:segment)', 'Staff::update/$1');
    $routes->delete('staff/(:segment)', 'Staff::delete/$1');

    // Staff shifts
    $routes->get('staff-shifts', 'StaffShifts::index');
    $routes->post('staff-shifts', 'StaffShifts::create');
    $routes->put('staff-shifts/(:segment)', 'StaffShifts::update/$1');
    $routes->delete('staff-shifts/(:segment)', 'StaffShifts::delete/$1');

    // Appointments
    $routes->get('appointments', 'Appointments::index');
    $routes->post('appointments', 'Appointments::create');
    $routes->put('appointments/(:segment)', 'Appointments::update/$1');
    $routes->delete('appointments/(:segment)', 'Appointments::delete/$1');
    $routes->get('appointments/available', 'Appointments::available');

    // Business hours
    $routes->get('business-hours', 'BusinessHours::index');
    $routes->post('business-hours', 'BusinessHours::create');
    $routes->put('business-hours/(:segment)', 'BusinessHours::update/$1');
    $routes->delete('business-hours/(:segment)', 'BusinessHours::delete/$1');

    // Customers
    $routes->get('customers', 'Customers::index');
    $routes->post('customers', 'Customers::create');
    $routes->get('customers/(:segment)', 'Customers::show/$1');
    $routes->put('customers/(:segment)', 'Customers::update/$1');
    $routes->delete('customers/(:segment)', 'Customers::delete/$1');

    $routes->get('user', 'User::index');
    $routes->post('user', 'User::create');
    $routes->get('user/(:segment)', 'User::show/$1');
    $routes->put('user/(:segment)', 'User::update/$1');
    $routes->delete('user/(:segment)', 'User::delete/$1');
});
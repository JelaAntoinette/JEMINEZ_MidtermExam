<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default route
$routes->get('/', 'Home::index');

// Main application routes
$routes->get('about', 'Home::about');
$routes->get('contact', 'Home::contact');

// Authentication Routes
$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::register');
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

// Fallback generic dashboard route (redirects to role-specific)
$routes->get('dashboard', 'Auth::dashboardRedirect');

// Student Routes
$routes->group('student', ['filter' => 'roleauth'], function($routes) {
    $routes->get('dashboard', 'StudentController::dashboard');
    $routes->get('my-courses', 'StudentController::myCourses');
    $routes->get('announcement', 'Announcement::index');
});

// Teacher Routes
$routes->group('teacher', ['filter' => 'roleauth'], function($routes) {
    $routes->get('dashboard', 'Teacher::dashboard');
    $routes->get('announcement', 'Announcement::index');
});

// Admin Routes
$routes->group('admin', ['filter' => 'roleauth'], function($routes) {
    $routes->get('dashboard', 'Admin::dashboard');
    $routes->get('announcement', 'Announcement::index');
    $routes->get('users', 'AdminController::index');
    $routes->get('users/create', 'AdminController::create');
    $routes->post('users/store', 'AdminController::store');
    $routes->get('users/edit/(:num)', 'AdminController::edit/$1');
    $routes->post('users/update/(:num)', 'AdminController::update/$1');
    $routes->get('users/delete/(:num)', 'AdminController::delete/$1');
    $routes->get('logout', 'AdminController::logout');
});

// Course Routes (Student)
$routes->get('courses', 'Course::index');
$routes->get('course/view/(:num)', 'Course::view/$1');
$routes->post('course/enroll', 'StudentController::enroll');  // ✅ Fixed route
$routes->post('student/enroll', 'StudentController::enroll');

// General announcements route (for public access or fallback)
$routes->get('announcements', 'Announcement::index');

// Optional shortcut route for managing users
$routes->get('users', 'AdminController::index');

// Test route
$routes->get('test-db', 'TestController::testDb');
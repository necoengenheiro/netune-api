<?php
    
    define('__APP_ROOT__', dirname(__DIR__));
    chdir(__APP_ROOT__);

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");
    header("Access-Control-Allow-Methods: GET,OPTIONS,POST");
       
    include 'vendor/atare/turim/autoloader.php';

    ini_set('display_startup_errors', -1);
    ini_set('display_errors', -1);
    error_reporting(-1);
    date_default_timezone_set('America/Sao_Paulo');

    atare\turim\Autoloader::init(array(
        'atare'     => __APP_ROOT__ . '/vendor/atare',
        'correio'     => __APP_ROOT__ . '/vendor/correio',
    ));

    atare\turim\view\View::add(array(
        'APP_VERSION'   => atare\turim\lib\Config::get('app', 'builder'),
    ));

    $bootstrap = new atare\turim\Bootstrap(new atare\turim\routing\Router());
    $bootstrap->loadFilters('app/filters/');
    $bootstrap->init();

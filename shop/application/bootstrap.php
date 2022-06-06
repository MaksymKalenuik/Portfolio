<?php
use \core\Autoload;
use \core\Route;
use \core\SessionManipulation;

require_once ABSOLUTE_PATH . '/application/core/Autoload.php';

spl_autoload_register(array(new Autoload(), 'autoload'));

SessionManipulation::start();
Route::start();
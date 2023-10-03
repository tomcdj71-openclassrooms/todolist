<?php

use App\Kernel;
use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\HttpFoundation\Request;

require dirname(__DIR__).'/config/bootstrap.php';

if ($_SERVER['APP_DEBUG']) {
    umask(0000);

    Debug::enable();
}

if ($trustedProxies = $_SERVER['TRUSTED_PROXIES'] ?? false) {
    Request::setTrustedProxies(explode(',', $trustedProxies), Request::HEADER_X_FORWARDED_ALL ^ Request::HEADER_X_FORWARDED_HOST);
}

if ($trustedHosts = $_SERVER['TRUSTED_HOSTS'] ?? false) {
    Request::setTrustedHosts([$trustedHosts]);
}

if ('prod' !== $_SERVER['APP_ENV']) {
    ini_set('assert.active', '1');
    ini_set('opcache.enable', '0');
    ini_set('opcache.memory_consumption', '256');
    ini_set('opcache.max_accelerated_files', '20000');
    ini_set('opcache.validate_timestamps', '0');
    ini_set('opcache.preload_user', 'www-data');
    ini_set('opcache.preload', '/var/www/html/todolist/config/preload.php');
    ini_set('realpath_cache_size', '4096K');
    ini_set('realpath_cache_ttl', '600');
} else {
    ini_set('assert.active', '-1');
}

$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
Request::enableHttpMethodParameterOverride();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);

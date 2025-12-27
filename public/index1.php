<?php
// public/index.php

// Prevent worker script termination when a client connection is interrupted
ignore_user_abort(true);

// Boot your app
require __DIR__.'/vendor/autoload.php';

$myApp = new \App\Kernel();
$myApp->boot();

// Handler outside the loop for better performance (doing less work)
$handler = static function () use ($myApp) {
    try {
        // Called when a request is received,
        // superglobals, php://input and the like are reset
        echo $myApp->handle($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
    } catch (\Throwable $exception) {
        // `set_exception_handler` is called only when the worker script ends,
        // which may not be what you expect, so catch and handle exceptions here
        (new \MyCustomExceptionHandler)->handleException($exception);
    }
};

$maxRequests = (int)($_SERVER['MAX_REQUESTS'] ?? 0);
for ($nbRequests = 0; !$maxRequests || $nbRequests < $maxRequests; ++$nbRequests) {
    $keepRunning = \frankenphp_handle_request($handler);

    // Do something after sending the HTTP response
    $myApp->terminate();

    // Call the garbage collector to reduce the chances of it being triggered in the middle of a page generation
    gc_collect_cycles();

    if (!$keepRunning) break;
}

// Cleanup
$myApp->shutdown();

<?php

include __DIR__.'/vendor/autoload.php';

$authService = new \Zend\Authentication\AuthenticationService();

if ($authService->hasIdentity()) {
    $authService->clearIdentity();
}

return header('location: login.php');

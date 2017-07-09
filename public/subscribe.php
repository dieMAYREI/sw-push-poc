<?php

require_once __DIR__.'/../bootstrap.php';

$subscriptionData = json_decode(file_get_contents('php://input'), true);

if (!isset($subscriptionData['endpoint'])) {
    http_response_code(400);
    echo 'Error: not a subscription';
    exit;
}

$subscription = new \DieMayrei\SwPushTest\Subscription();
$subscription->endpoint = $subscriptionData['endpoint'];
$subscription->token = $subscriptionData['token'];
$subscription->key = $subscriptionData['key'];

$storage = $container->get(\DieMayrei\SwPushTest\StorageInterface::class);

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
    case 'PUT':
        $storage->store($subscription);
        break;

    case 'DELETE':
        $storage->delete($subscription);
        break;

    default:
        http_response_code(405);
        echo 'Error: method not handled';
        exit;
}

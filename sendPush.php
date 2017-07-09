#!/usr/bin/env php
<?php

if ($argc !== 2) {
    echo 'Usage: sendPush message';
    exit(1);
}

require_once __DIR__.'/bootstrap.php';
$storage = $container->get(\DieMayrei\SwPushTest\StorageInterface::class);
$pushService = $container->get(\DieMayrei\SwPushTest\PushServiceInterface::class);
$msg = $argv[1];
foreach ($storage->getAll() as $sub) {
    $pushService->sendMessage($sub, $msg);
}

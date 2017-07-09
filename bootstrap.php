<?php

require_once __DIR__.'/vendor/autoload.php';

$builder = new DI\ContainerBuilder();
$builder->addDefinitions([
    \DieMayrei\SwPushTest\StorageInterface::class => DI\object(\DieMayrei\SwPushTest\JsonFileStorage::class)->constructorParameter(
        'filename',
        __DIR__.'/storage.json'
    ),
    \DieMayrei\SwPushTest\PushServiceInterface::class => DI\object(\DieMayrei\SwPushTest\MinishWebpushService::class)->constructorParameter(
        'auth',
        array(
            'VAPID' => array(
                'subject' => 'https://github.com/Minishlink/web-push-php-example/',
                'publicKey' => 'BCmti7ScwxxVAlB7WAyxoOXtV7J8vVCXwEDIFXjKvD-ma-yJx_eHJLdADyyzzTKRGb395bSAtxlh4wuDycO3Ih4',
                'privateKey' => 'HJweeF64L35gw5YLECa-K7hwp3LLfcKtpdRNK8C_fPQ',
            ),
        )
    ),
]);
$container = $builder->build();

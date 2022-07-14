<?php
require_once __DIR__.'/../vendor/autoload.php';

echo 'Check connection...'.PHP_EOL;

$connectionOptions = new \Nats\ConnectionOptions();
$connectionOptions->setHost('localhost')
    ->setPort(4222)
    ->setTlsStatus(true)
    ->setSslContext([
        'local_cert'=> '/path/to/cert/client-cert.pem',
        'local_pk' => '/path/to/cert/client-key.pem',
        'cafile' => '/path/to/cert/rootCA.pem',
        'crypto_method' => STREAM_CRYPTO_METHOD_TLS_CLIENT,
    ]);

$connection = new Nats\Connection($connectionOptions);
$connection->connect();
$connection->ping();
$connection->close();

echo 'Success.'.PHP_EOL;
<?php

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

return [
  'debug'  => false,
  'panel' => [
    'css' => 'assets/css/custom-panel.css',
    'language' => 'de'
  ],
  'email' => [
    'transport' => [
      'type' => 'smtp',
      'host' => getenv('MAIL_HOST'),
      'port' => getenv('MAIL_PORT'),
      'security' => true,
      'auth' => true,
      'username' => getenv('MAIL_USERNAME'),
      'password' => getenv('MAIL_PASSWORD'),
    ]
  ],
];
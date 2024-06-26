<?php

return [
  'debug'  => false,
  'panel' => [
    'css' => 'assets/css/custom-panel.css',
    'language' => 'de'
  ],
  'email' => [
    'transport' => [
      'type' => 'smtp',
      'host' => $_ENV['MAIL_HOST'],
      'port' => $_ENV['MAIL_PORT'],
      'security' => true,
      'auth' => true,
      'username' => $_ENV['MAIL_USERNAME'],
      'password' => $_ENV['MAIL_PASSWORD'],
    ]
  ],
];

<?php

return [
  'debug'  => false,
  'panel' => [
    'css' => 'assets/css/custom-panel.css',
    'language' => 'de'
  ],
  // 'email' => [
  //     'transport' => [
  //       'type' => 'smtp',
  //       'host' => 'localhost',
  //       'port' => 1025,
  //       'security' => false
  //     ]
  //   ],
  'email' => [
    'transport' => [
      'type' => 'smtp',
      'host' => 'asmtp.mail.hostpoint.ch',
      'port' => 465,
      'security' => true,
      'auth' => true,
      'username' => 'teehuesli@vonwilhelm.ch',
      'password' => 'E5cfxT!?sBg3rg7UYE62',
    ]
  ],
];

<?php
return function($kirby, $pages, $page) {

    $alert = null;

    if($kirby->request()->is('POST') && get('submit')) {

        // check the honeypot
        if(empty(get('website')) === false) {
            go($page->url());
            exit;
        }

        $data = [
            'fname'  => get('fname'),
            'lname'  => get('lname'),
            'address'  => get('address'),
            'city'  => get('city'),
            'phone'  => get('phone'),
            'email' => get('email'),
            'text'  => get('text'),
            'become_member' => get('become_member') || ''
        ];

        $rules = [
            'fname'  => ['required', 'minLength' => 3],
            'lname'  => ['required', 'minLength' => 3],
            // 'address'  => ['required', 'minLength' => 3],
            // 'city'  => ['required', 'minLength' => 3],
            // 'phone'  => ['required', 'minLength' => 10],
            'email' => ['required', 'email'],
            'text'  => ['required', 'minLength' => 3, 'maxLength' => 3000],
        ];

        $messages = [
            'fname'  => 'Bitte gib einen gültigen Namen ein',
            'lname'  => 'Bitte gib einen gültigen Namen ein',
            'address'  => 'Bitte gib eine gültige Adresse ein',
            'city'  => 'Bitte gib eine gültige Stadt und PLZ ein',
            'phone'  => 'Bitte gib eine gültige Telefonnummer ein',
            'email' => 'Bitte gib eine gültige E-Mail-Adresse ein',
            'text'  => 'Bitte gib eine Nachricht zwischen 3 und 3000 Zeichen ein'
        ];

        $from = new \Kirby\Cms\User([
            'email' => $data['email'],
            'name' => $data['fname'] . ' ' . $data['lname'],
          ]);

        // some of the data is invalid
        if($invalid = invalid($data, $rules, $messages)) {
            $alert = $invalid;

            // the data is fine, let's send the email
        } else {
            try {
                $kirby->email([
                    'template' => 'email',
                    'from'     => $from,
                    'replyTo'  => $data['email'],
                    'to'       => 'teehuesli@vonwilhelm.ch',
                    // 'to'       => 'hello@vonwilhelm.ch',
                    'subject'  => 'Teehüsli-Formular: ' . esc($data['fname']) . ' ' .esc($data['lname']),
                    'data' => [
                        'fname' => esc($data['fname']),
                        'lname' => esc($data['lname']),
                        'address' => esc($data['address']),
                        'city' => esc($data['city']),
                        'phone' => esc($data['phone']),
                        'email' => esc($data['email']),
                        'text'   => esc($data['text']),
                        'become_member' => esc($data['become_member']),
                    ]
                ]);

            } catch (Exception $error) {
                if(option('debug')):
                    $alert['error'] = 'The form could not be sent: <strong>' . $error->getMessage() . '</strong>';
                else:
                    $alert['error'] = 'The form could not be sent!';
                endif;
            }

            // no exception occurred, let's send a success message
            if (empty($alert) === true) {
                // $success = 'Your message has been sent, thank you. We will get back to you soon!';
                $data = [];
                $show_pop_up = true;
                // $fullname = $data['fname'] . ' ' . $data['lname'];
                //  return page('success')->go();
            }
        }
    }

    return [
        'alert'   => $alert,
        'data'    => $data ?? false,
        'success' => $success ?? false,
        'show_pop_up' => $show_pop_up ?? false
    ];
};
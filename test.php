<?php
require_once('src/EmailValidator.php');

$emails = [
    'valid@mail.ru',
    'invalid@domain..ru',
    'v.a.l.i.d@mail.ru',
    'mail@not-valid-mx-record.test'
];

foreach ($emails as $email) {
    $validator = new EvilWolf\EmailValidator($email);
    echo $email . ' ' . ($validator->isValid() ? 'valid' : 'invalid') . PHP_EOL;
}

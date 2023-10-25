<?php

use Http\Forms\LoginForm;
use Core\Authenticator;

//Validating log in
$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);
 //Attempting to sign in
$signedIn = (new Authenticator)->attempt(
    $attributes['email'], $attributes['password']
);
//If login fails return to prev page
if (!$signedIn) {
    $form->error(
        'email', 'No matching account found for that email address and password.'
    )->throw();
}

//send them to home page
redirect('/');

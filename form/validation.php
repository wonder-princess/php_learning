<?php

function validation($request)
{
    $errors = [];

    if (
        empty($request['your_name']) ||
        mb_strlen($request['your_name']) > 20
    ) {
        $errors[] = 'confirm your name';
    }
    if (
        empty($request['email']) ||
        !filter_var($request['email'], FILTER_VALIDATE_EMAIL)
    ) {
        $errors[] = 'confirm e-mail';
    }

    if (!empty($request['url'])) {
        if (!filter_var($request['url'], FILTER_VALIDATE_URL)) {
            $errors[] = 'confirm url';
        }
    }

    if (empty($request['caution'])) {
        $errors[] = 'check the notes';
    }

    return $errors;
}

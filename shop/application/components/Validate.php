<?php

namespace components;

class Validate {


    public function isPasswordValid($password, $limit = 8) {
        return (strlen($password) >= $limit);
    }

    public function isEmailValid($email) {
        return (boolean)(filter_var($email, FILTER_VALIDATE_EMAIL));
    }

    public function isPasswordsMatch($password, $confirmPassword){
        return $password === $confirmPassword;
    }

    public function isPhoneValid($phone) {
        return preg_match('/^[+][3][8][0][0-9]{9}+$/', $phone);
    }
public function checkALLFields($inputData){
    $i = 0;
    foreach ($inputData as $value) {
        if (!empty($value)) {
            continue;
        }
        $i++;
    }
    return $i == 0 ;
}
public function isPasswordCharValid($password) {
    $nonValid = 0;
    for ($i = 0; $i < strlen($password); $i++) {
        if (!(is_numeric($password[$i]) || ctype_lower($password[$i]) || ctype_upper($password[$i]))) {
            $nonValid++;
        }
    }
    return $nonValid == 0;
}

}












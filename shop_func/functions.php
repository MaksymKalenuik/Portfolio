<?php
require_once 'config.php';
function trimData($array)
{
    $trimArray = [];
    foreach ($array as $key => $value) {
        $trimArray[$key] = trim($value);
    }
    return $trimArray;
}

function redirect($url)
{
    header('location: ' . $url);
    exit;
}

function checkMatchString($string, $confirm)
{
    if ($string == $confirm) {
        return '';
    } else {
        return 'Please, enter confirm password equal to password';
    }
}

function checkStringLenght($string, $lenght = 8)
{
    if (strlen($string) >= ($lenght)) {
        return '';
    } else {
        return 'Password length must be greater than 8 symbols';
    }
}

function checkStringForElements($string)
{
    $nonValid = 0;
    for ($i = 0; $i < strlen($string); $i++) {
        if (!(is_numeric($string[$i]) || ctype_lower($string[$i]) || ctype_upper($string[$i]))) {
            $nonValid++;
        }
    }
    return ($nonValid == 0) ? '' : 'Password must contain 3 type of if characters lower letters, upper letters and numbers';
}

function isValidEmail($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return '';
    } else {
        return 'Please, enter existing email';
    }
}

function isLoginValid($connection, $login)
{
    $sql = 'SELECT * FROM users WHERE login="' . $login . '"';
    $result = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 0) {
        return '';
    }
    return 'Login is busy';
}

function checkAllFields($inputData)
{
    $i = 0;
    foreach ($inputData as $value) {
        if (!empty($value)) {
            continue;
        }
        $i++;
    }
    return ($i == 0) ? '' : 'Enter all field';
}

function isphoneValid($phone)
{
    if (preg_match('/^[+][3][8][0][0-9]{9}+$/', $phone)) {
        return '';
    }
    return 'Enter valid phone (ex: +380911111111)';
}


function checkValidRegisterData($connection, $inputData)
{
    $errors = [];
    if (!empty(isLoginValid($connection, $inputData['login']))) {
        $errors[] = isLoginValid($connection, $inputData['login']);
    }
    if (!empty(isValidEmail($inputData['email']))) {
        $errors[] = isValidEmail($inputData['email']);
    }
    if (!empty(checkMatchString($inputData['password'], $inputData['confirm_password']))) {
        $errors[] = checkMatchString($inputData['password'], $inputData['confirm_password']);
    }
    if (!empty(checkStringLenght($inputData['password']))) {
        $errors[] = checkStringLenght($inputData['password']);
    }
    if (!empty(checkStringForElements($inputData['password']))) {
        $errors[] = checkStringForElements($inputData['password']);
    }
    if (!empty(checkAllFields($inputData))) {
        $errors[] = checkAllFields($inputData);
    }
    if (!empty(isPhoneValid($inputData['phone']))) {
        $errors[] = isPhoneValid($inputData['phone']);
    }
    return $errors;
}

function signUp($connection, $inputData)
{
    $sql = 'INSERT INTO users (login, password, email, firstname, lastname, phone, age, sex, country, city, address)'
        . ' VALUES ('
        . '"' . $inputData['login'] . '", '
        . '"' . $inputData['password'] . '", '
        . '"' . $inputData['email'] . '", '
        . '"' . $inputData['firstname'] . '", '
        . '"' . $inputData['lastname'] . '", '
        . '"' . $inputData['phone'] . '", '
        . '' . $inputData['age'] . ', '
        . '' . $inputData['sex'] . ', '
        . '"' . $inputData['country'] . '", '
        . '"' . $inputData['city'] . '", '
        . '"' . $inputData['address'] . '" '

        . ')';
    $result = mysqli_query($connection, $sql);
    return $result;
}

function authentication($connection, $inputData)
{
    $sql = 'SELECT * FROM users WHERE login = "' . $inputData['login'] . '" AND password = "' . $inputData['password'] . '" LIMIT 1';
    print_r($sql);
    $result = mysqli_query($connection, $sql);
    if ($result) {
        return mysqli_fetch_assoc($result);
    }
    return [];
}

function logIn($connection, $inputData)
{

    print_r($inputData);
    $user = authentication($connection, $inputData);
    print_r($user);


    if ($user) {
        unset ($user['password']);
        $_SESSION['logged_user'] = $user;
        return true;
    }
    return false;
}

function checkValidLoginData($connection, $inputData)
{
    $errors = [];
    if (!empty(checkAllFields($inputData))) {
        $errors[] = checkAllFields($inputData);
    }
    return $errors;
}

function checkValidEditData($inputData)
{
    $errors = [];

    if (!empty(isValidEmail($inputData['email']))) {
        $errors[] = isValidEmail($inputData['email']);
    }
    if (!empty(checkAllFields($inputData))) {
        $errors[] = checkAllFields($inputData);
    }
    if (!empty(isPhoneValid($inputData['phone']))) {
        $errors[] = isPhoneValid($inputData['phone']);
    }
    return $errors;
}

function editUser($connection, $inputData)
{
    $sql = 'UPDATE users SET '
        . 'email = "' . $inputData['email'] . '", '
        . 'firstname = "' . $inputData['firstname'] . '", '
        . 'lastname = "' . $inputData['lastname'] . '", '
        . 'phone = "' . $inputData['phone'] . '", '
        . 'age = "' . $inputData['age'] . '", '
        . 'sex = "' . $inputData['sex'] . '", '
        . 'country = "' . $inputData['country'] . '", '
        . 'city = "' . $inputData['city'] . '", '
        . 'address = "' . $inputData['address'] . '" '
        . 'WHERE login = "' . $_SESSION['logged_user']['login'] . '"';
    $result = mysqli_query($connection, $sql);
    return $result;
}

function getUserinfoByLogin($connection, $login)
{
    $sql = 'SELECT * FROM users WHERE login = "' . $login . '" LIMIT 1';
    print_r($sql);
    $result = mysqli_query($connection, $sql);
    if ($result) {
        return mysqli_fetch_assoc($result);
    }
    return [];
}

function updateSessionData($connection, $login)
{
    $userInfo = getUserinfoByLogin($connection, $login);
    if ($userInfo) {
        unset ($userInfo['password']);
        $_SESSION['logged_user'] = $userInfo;
        return true;
    }
    return false;
}

function logout()
{
    unset($_SESSION['logged_user']);
}

function getAllCategories($connection)
{
    $sql = 'SELECT * FROM categories';
    $result = mysqli_query($connection, $sql);
    $rows = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
    }
    return $rows;
}

function checkValidCategoryData($connection, $inputData)
{
    $errors = [];
    if (empty($inputData['category_name'])) {
        $errors[] = 'Please, enter category name';
    }
    if (!empty(checkCategoryName($connection, $inputData['category_name']))) {
        $errors[] = checkCategoryName($connection, $inputData['category_name']);
    }
    return $errors;
}

function checkCategoryName($connection, $categoryName)
{
    $sql = 'SELECT * FROM categories WHERE category_name = "' . $categoryName . '"';
    $result = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 0) {
        return '';
    }
    return 'Category Login is busy';
}

function addCategory($connection, $inputData)
{
    $sql = 'INSERT INTO categories (category_name, parent) VALUES '
        . '("' . $inputData['category_name'] . '", "' . $inputData['parent'] . '")';
    $result = mysqli_query($connection, $sql);
    return $result;
}

function getCategoryById($connection, $categoryId)
{
    $sql = 'SELECT * FROM categories WHERE id=' . $categoryId;
    $result = mysqli_query($connection, $sql);
    return mysqli_fetch_assoc($result);
}

function editCategory($connection, $inputData, $categoryId)
{
    $sql = 'UPDATE categories SET '
        . 'category_name ="' . $inputData['category_name'] . '", '
        . 'parent = "' . $inputData['parent'] . '" '
        . 'WHERE id=' . $categoryId;
    return mysqli_query($connection, $sql);
}

function checkValidEditCategoryData($connection, $inputData, $categoryName)
{
    $errors = [];
    if (empty($inputData['category_name'])) {
        $errors[] = 'Please, enter category name';
    }
    if ($inputData['category_name'] != $categoryName) {
        if (!empty(checkCategoryName($connection, $inputData['category_name']))) {
            $errors[] = checkCategoryName($connection, $inputData['category_name']);
        }
    }
    return $errors;
}

function deleteCategory($connection, $categoryId)
{
    $sql = 'DELETE FROM categories WHERE id = ' . $categoryId;
    return mysqli_query($connection, $sql);
}

function isUserLogged()
{
    if (empty($_SESSION['logged_user'])) {
        return true;
    }
    return false;
}

function isUserAdmin()
{
    if ($_SESSION['logged_user']['login'] == 'admin') {
        return true;
    }
    return false;
}




//ctype_upper чи буква велика
//is_numeric чи є цифри
//ctype_lower чи буква виликою












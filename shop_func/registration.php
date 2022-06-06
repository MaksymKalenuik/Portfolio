<?php

require_once 'functions.php';
if(isset($_POST['send'])) {
    $inputData = trimData($_POST);
    $errors = checkValidRegisterData($connection, $inputData);
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
    } else {
        $inputData['password'] = sha1($inputData['password']) ;
        if (signUp($connection, $inputData)) {
            if(logIn($connection, $inputData)) {
                redirect('index.php');
            }
        }
    }
}
?>
<form method="post" action="">
    <label for="Login">Login</label>
    <input type="text" name="login" value="" id="Login">
    <br>
    <label for="Password">Password</label>
    <input type="Password" name="password" value="" id="Password">
    <br>
    <label for="confirm_password">Confirm_Password</label>
    <input type="password" name="confirm_password" value="" id="confirm_password">
    <br>
    <label for="email">Email</label>
    <input type="email" name="email" value="" id="email">
    <br>
    <label for="firstname">Firstname</label>
    <input type="text" name="firstname" value="" id="firstname">
    <br>
    <label for="lastname">Lastname</label>
    <input type="text" name="lastname" value="" id="lastname">
    <br>
    <label for="phone">Phone</label>
    <input type="text" name="phone" value="" id="phone">
    <br>
    <label for="age">Age</label>
    <input type="number" name="age" value="" id="age" min="0" max="120">
    <br>
    <label for="sex">Sex</label>
    <br>
    <input type="radio" Name="sex" value="1" id="male">
    <label for="male">Male</label>
    <input type="radio" Name="sex" value="2" id="female">
    <label for="female">Female</label>
    <br>
    <label for="country">Country</label>
    <input type="text" name="country" value="" id="country">
    <br>
    <label for="city">City</label>
    <input type="text" name="city" value="" id="city">
    <br>
    <label for="address">Address</label>
    <input type="text" name="address" value="" id="address">
    <br>
    <input type="submit" name="send" value="Send">


</form>


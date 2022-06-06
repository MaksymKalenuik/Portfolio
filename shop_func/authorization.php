<?php
require_once 'functions.php';
if (isset($_POST['send'])) {
    $inputData = trimData($_POST);
    $errors = checkValidLoginData($connection, $inputData);
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
    } else {
        $inputData['password'] = sha1($inputData['password']);
        if (logIn($connection, $inputData)) {
            redirect('index.php');
        } else {
            echo "Wrong login or password";
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
    <input type="submit" name="send" value="Send">

</form>
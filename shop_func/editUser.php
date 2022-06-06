<?php

require_once 'functions.php';
if(isset($_POST['send'])) {
    $inputData = trimData($_POST);

    $errors = checkValidEditData($inputData);
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
    } else {
        if (editUser($connection, $inputData)) {
            if(updateSessionData($connection, $_SESSION['logged_user']['login'])) {
                redirect('index.php');
            }
        }
    }
}
?>
<form method="post" action="">
    <label for="Login">Login</label>
    <input type="text" name="login" value="<?= $_SESSION['logged_user']['login']?>" id="Login" disabled>
    <br>
    <label for="email">Email</label>
    <input type="email" name="email" value="<?= $_SESSION['logged_user']['email']?>" id="email">
    <br>
    <label for="firstname">Firstname</label>
    <input type="text" name="firstname" value="<?= $_SESSION['logged_user']['firstname']?>" id="firstname">
    <br>
    <label for="lastname">Lastname</label>
    <input type="text" name="lastname" value="<?= $_SESSION['logged_user']['lastname']?>" id="lastname">
    <br>
    <label for="phone">Phone</label>
    <input type="text" name="phone" value="<?= $_SESSION['logged_user']['phone']?>" id="phone">
    <br>
    <label for="age">Age</label>
    <input type="number" name="age" value="<?= $_SESSION['logged_user']['age']?>" id="age" min="0" max="120">
    <br>
    <label for="sex">Sex</label>
    <br>
    <input type="radio" Name="sex" value="1" id="male" <?= ($_SESSION['logged_user']['sex'] == 1) ? 'checked' : '' ; ?>>
    <label for="male">Male</label>
    <input type="radio" Name="sex" value="2" id="female" <?= ($_SESSION['logged_user']['sex'] == 2) ? 'checked' : '' ; ?>>
    <label for="female">Female</label>
    <br>
    <label for="country">Country</label>
    <input type="text" name="country" value="<?= $_SESSION['logged_user']['country']?>" id="country">
    <br>
    <label for="city">City</label>
    <input type="text" name="city" value="<?= $_SESSION['logged_user']['city']?>" id="city">
    <br>
    <label for="address">Address</label>
    <input type="text" name="address" value="<?= $_SESSION['logged_user']['address']?>" id="address">
    <br>
    <input type="submit" name="send" value="Send">


</form>







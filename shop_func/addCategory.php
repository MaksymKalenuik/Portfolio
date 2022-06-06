<?php
require_once 'functions.php';
if(isUserLogged()) redirect('authorization.php');
if(!isUserAdmin()) redirect('authorization.php');
$categories=getAllCategories($connection);
if (isset($_POST['send'])) {
    $inputData = trimData($_POST);
    $errors = checkValidCategoryData($connection, $inputData);
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
    } else {
        if (addCategory($connection, $inputData)) {
            redirect('listCategories.php');
        }
    }
}
?>

<form method="post" action="">
    <label for="category_name">Name</label>
    <input type="text" name="category_name" id="category_name" value="">
    <br>
    <label for="parent">Parents</label>
    <select name="parent" id="parent">
        <option value="">Please, select parent...</option>
        <?php if(!empty($categories)) : ?>
        <?php foreach ($categories as $category ) : ?>
            <option value="<?= $category['id'] ?>"><?= $category['category_name']; ?></option>
        <?php endforeach; ?>
        <?php endif; ?>
    </select>
    <br>
    <input type="submit" name="send" value="Send">
</form>





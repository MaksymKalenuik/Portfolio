<?php
require_once 'functions.php';
if(isUserLogged()) redirect('authorization.php');
if(!isUserAdmin()) redirect('authorization.php');
$categories=getAllCategories($connection);
$currentId=$_GET['id'];
$currentCategory=getCategoryById($connection, $currentId);
if (isset($_POST['send'])) {
    $inputData = trimData($_POST);
    $errors = checkValidEditCategoryData($connection, $inputData, $currentCategory['category_name']);
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
    } else {
        if (editCategory($connection, $inputData, $currentId)) {
            redirect('listCategories.php');
        }
    }
}
?>

<form method="post" action="">
    <label for="category_name">Name</label>
    <input type="text" name="category_name" id="category_name" value="<?= $currentCategory['category_name']; ?>">
    <br>
    <label for="parent">Parents</label>
    <select name="parent" id="parent">
        <option value="" <?= ($currentCategory['parent']==0) ? 'selected' : '' ?>>Please, select parent...</option>
        <?php if(!empty($categories)) : ?>
            <?php foreach ($categories as $category ) : ?>
                <option value="<?= $category['id']; ?>" <?= ($currentCategory['parent']== $category['id']) ? 'selected' : '' ?>><?= $category['category_name']; ?></option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>
    <br>
    <input type="submit" name="send" value="Send">
</form>








<?php
require_once 'functions.php';
if(isUserLogged()) redirect('authorization.php');
if(!isUserAdmin()) redirect('authorization.php');
$currentId=$_GET['id'];
$currentCategory=getCategoryById($connection, $currentId);
if(isset($_POST['yes'])) {
    deleteCategory($connection, $currentId);
    redirect('listCategories.php');
}
if(isset($_POST['no'])) {
    redirect('listCategories.php');
}
?>

<span>Do you really want to delete <?= $currentCategory['category_name']; ?> category?</span>
<form action="" method="post">
    <input type="submit" value="Yes" name="yes">
</form>
<form action="" method="post">
    <input type="submit" value="No" name="no">
</form>

<?php
require_once 'functions.php';

if(isUserLogged()) redirect('authorization.php');

foreach ($_SESSION['logged_user'] as $key => $value) {
    echo ucfirst($key) . '-' . $value . '<br>';
}
?>
<a href ="editUser.php">Edit</a>
<a href ="logout.php">Logout</a>
<?php if (isUserAdmin()) : ?>
    <ul>
        <li><a href="listCategories.php">List Categories</a></li>
        <li><a href="listProducts.php">List Categories</a></li>
        <li><a href="listCustomer.php">List Categories</a></li>
    </ul>
<?php endif; ?>








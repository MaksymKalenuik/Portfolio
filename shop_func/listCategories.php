<?php
require_once 'functions.php';
if(isUserLogged()) redirect('authorization.php');
if(!isUserAdmin()) redirect('index.php');
$categories= getAllCategories($connection);
?>
<?php if(count($categories)>0):?>
    <a href ="addCategory.php"> add </a>
    <table border="1">
    <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Edit</th>
    <th>Delete</th>
    </tr>
    <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?= $category['id'];?></td>
            <td><?= $category['category_name'];?></td>
            <td><a href="editCategory.php?id=<?= $category['id'];?>">Edit</a></td>
            <td><a href="deleteCategory.php?id=<?= $category['id'];?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php else : ?>
    <span>You don't have any categories. Do you want to<a href ="addCategory.php"> add </a>some? </span>
<?php endif; ?>
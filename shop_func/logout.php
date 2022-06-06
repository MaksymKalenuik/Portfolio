<?php
require_once 'functions.php';
if(isset($_POST['yes'])) {
    logout();
        redirect('authorization.php');
}
if(isset($_POST['no'])) {
    redirect('index.php');
}

?>
<span>Do you really want to logout?</span>
<form action="" method="post">
    <input type="submit" value="Yes" name="yes">
</form>
<form action="" method="post">
    <input type="submit" value="No" name="no">
</form>
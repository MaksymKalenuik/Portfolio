<?php
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'shop_kalenyuk';

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($connection === false) {
    echo 'Error:' . mysqli_error($connection);
}

session_start();











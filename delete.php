<?php include 'inc/header.php'; ?>

    <!--PHP OOP and MySQLi CRUD Bangla Tutorial (Part-03)-->
<?php
include 'Database.php';

$db = new Database();

$id = $_GET['id'];

$query = "DELETE FROM userdata  WHERE id=$id";
$deleteData = $db->delete($query);
exit();
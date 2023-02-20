<?php 

include("../config/connect.php");

$id = $_GET['id'];

if ($_GET) {
    $sql = "DELETE FROM books WHERE books.id = $id";
    var_dump($sql);
    $result = mysqli_query($mysqli, $sql);
    header('location: ../index.php');
}

?>
<?php
include ('RPL_Connect.php');
session_start();
If ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_cart'])) {
        //query SQL
        $id_cart_upd = $_GET['id_cart'];
        $query = "DELETE FROM cart WHERE id_cart='$id_cart_upd'";

        //eksekusi query
        $result = mysqli_query(connection(),$query);
        header("Location: RPL_Cart.php");
        exit();
    }
    }
?>
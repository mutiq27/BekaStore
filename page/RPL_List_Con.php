
<?php
   include ('RPL_Connect.php');
     if(isset($_POST['pilih'])){
        $Pembeli = $_POST ['Pembeli'];
        $id_barang = $_POST ['id_barang'];
        $querySold =  "UPDATE produk SET status_barang = 'Sold Out' WHERE id_barang = '$id_barang'";
        $result = mysqli_query(connection(),$querySold);

        $queryHis = "UPDATE transaksi  SET id_pembeli = '$Pembeli' where id_barangTerjual = '$id_barang'"; 
        $result2 = mysqli_query(connection(),$queryHis);

        header("Location: RPL_ListItem.php");
        exit();

     }

     If ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id_barang'])) {
            //query SQL
            $id_barang = $_GET['id_barang'];
            $query = "UPDATE produk SET status_barang = 'Sold Out' WHERE id_barang = '$id_barang'";
    
            //eksekusi query
            $result = mysqli_query(connection(),$query);
            header("Location: RPL_ListItem.php");
            exit();
        }
        }
?>
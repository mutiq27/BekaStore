
<?php
    // session_start();
    session_start();
    include ('RPL_Connect.php');
    
    $id_user = $_SESSION['id_user'];
    // $id_user = '15';
    // $id_user = $_SESSION['id_user'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["nama"];
        $kategori = $_POST ["kategori"];
        $harga = $_POST ["harga"];
        $detail = $_POST["detail"];
        $foto = $_FILES ['foto']['name'];

        if ((($_FILES["foto"]["type"] == "image/png") || ($_FILES["foto"]["type"] == "image/jpeg") || ($_FILES["foto"]["type"] == "")) 
        && ($_FILES["foto"]["size"] < 10000000))
        {
        if ($_FILES["foto"]["error"] > 0)
        {
            echo "Return Code: " . $_FILES["foto"]["error"] . "<br />";
        }
        else
        {
            echo "Upload: " . $_FILES["foto"]["name"] . "<br />";
            echo "Type: " . $_FILES["foto"]["type"] . "<br />";
            echo "Size: " . ($_FILES["foto"]["size"] / 1024) . " Kb<br />";
            echo "Temp FILE: " . $_FILES["foto"]["tmp_name"] . "<br />";

            if (FILE_exists("upload/" . $_FILES["foto"]["name"]))
            {
                echo $_FILES["foto"]["name"] . " already exists. ";
            }
            else
            {
                move_uploaded_FILE($_FILES["foto"]["tmp_name"], "upload/" . $_FILES["foto"]["name"]);
                echo "Stored in: " . "upload/" . $_FILES["foto"]["name"];
            }
        }
        }else{
             echo "Invalid FILE";
        
        }

    }

    $query = "INSERT INTO produk (kode_user, nama_barang, kategori, harga, foto, detail, status_barang, tanggal_upload) values ('$id_user','$name', '$kategori', '$harga', '$foto', '$detail', 'Available', NOW())";
    $result = mysqli_query(connection(),$query);
    if ($result) {
        echo "SUCSESS";

        }
    else {
            echo "Error description: " . mysqli_error($connection);
    }


    header('Location: Catalog.php');
    exit();
?>

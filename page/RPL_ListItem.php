<?php
   session_start();
   include ('RPL_Connect.php');

   $id_user = $_SESSION['id_user'];
    // $id_user = '15';
    // menmapilkan list item
    // task: coba ambil datanya dari cart bukan produk
   $query = mysqli_query(connection(),"SELECT * FROM produk where kode_user = '$id_user' and not status_barang = 'Sold Out' ");
   $jumProduk = mysqli_num_rows($query);

   
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/history.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <title>BekaStore</title>
  </head>
  <body>

    <!-- Awal Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light main-color">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="shopping-cart.png" width="50" height="50" class="me-2">
                Beka<strong>Store</strong>
              </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <form class="d-flex ms-auto my-4 my-lg-0" action="Catalog.php" method="GET">
                <input class="form-control me-2" name="cari" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-light" type="submit"><i class="fi fi-br-search"></i></button>
              </form>
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="Catalog.php">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Category
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="Catalog_Sec.php">Secondhand</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="Catalog_Dorm.php">Dormitory</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="Catalog_Gr.php">Grant</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Akhir Navbar -->

      <!-- Awal Breadcrumb Product -->
      <div class="container">
        <nav aria-label="breadcrumb" style="background-color: #f2f2f2;" class="mt-3">
            <ol class="breadcrumb p-3">
              <li class="breadcrumb-item"><a href="Catalog.php" class="text-decoration-none">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">List Item</li>
            </ol>
          </nav>
      </div>
      <!-- Akhir Breadcrumb Product -->

      <!-- Awal History Beli -->
      <div class="container">
        <div class="row row-produk">
            <div class="col">
                <table class="table table-responsive">
                    <thead class="table-dark">
                      <tr  class="tr-header">
                        <th style="width: 10%;">Hapus</th>
                        <th style="width: 10%;">Edit</th>
                        <th style="width: 16%;">Gambar</th>
                        <th style="width: 16%;">Produk</th>
                        <th style="width: 14%;">Harga</th>
                        <th style="width: 16%;">Daftar Pembeli</th>
                        <th style="width: 17%;">Konfirmasi </th>
                      </tr>
                    </thead>
                    <tbody class="align-middle">
                    <?php
                        if ($jumProduk==0){
                    ?>
                    <tr>
                        <td colspan=5 class="text-center"> Data Produk tidak tersedia</td>
                    </tr>
                    <?php  }
                    else{
                        $jumlah=1;
                         while ($rowData = mysqli_fetch_assoc($query)) {
                            ?>
                    <form action="RPL_List_Con.php" method="POST">
                      <tr>
                        <th scope="row"><a href="<?php echo "RPL_List_Con.php?id_barang=".$rowData['id_barang']; ?>"><i class="fa-solid fa-circle-xmark fs-4 text-dark"></i></a></th>
                        <input type="hidden" name="id_barang" value="<?php echo $rowData['id_barang']; ?>">
                        <td><a href="<?php echo "RPL_ListItem_upd.php?id_barang=".$rowData['id_barang']; ?>" class="text-decoration-none">Update</a></td>
                        <td><img src='upload/<?php echo $rowData['foto']?>' class="img-history"></td>
                        <td><?php echo $rowData['nama_barang'];?></td>
                        <td><?php echo $rowData['harga'];?></td>
                        <?php
                         // menampilkan list pembeli per produk
                            $queryPembeli = mysqli_query(connection(),"SELECT pengguna.id_user, pengguna.nama_user
                            from cart 
                            join pengguna on cart.kode_pembeli = pengguna.id_user
                            where cart.kode_barang ='" .  $rowData['id_barang'] . "' ");
                        ?>
                       <td><select name="Pembeli" id="Pembeli" >
                                <option value="">Pilih Pembeli</option>
                                    <?php while ($rowPembeli = mysqli_fetch_assoc($queryPembeli)) : ?>
                                       <option value="<?php echo $rowPembeli['id_user'] ?>"  ><?php echo $rowPembeli['id_user'] . ' ' . $rowPembeli['nama_user']; ?></option>
                                    <?php endwhile ?>
                            </select>
                                   
                        </td>
                        <td><button type="submit" name="pilih">Konfirmasi Pembeli</button></td>
                      </tr>
                      </form>
                            <?php
                            $jumlah++;
                        }
                    }
                ?>
                    </tbody>
                  </table>
            </div>
        </div>
      </div>
      <!-- Akhir History Beli-->

      <!-- Awal Footer -->
      <footer class="bg-light p-5 mt-5">
        <div class="container">
          <div class="row">
            <div class="col-md-6 text-md-start text-center pt-2 pb-2">
              <a href="#" style="text-decoration: none;">
                <img src="../assets/homepage/logo.png" style="width: 40px;" >
              </a>
              <span class="ps-1">Bekas<strong>Store</strong></span>
            </div>
            <div class="col-md-6 text-md-end text-center pt-2 pb-2">
              <a href="#" style="text-decoration: none;">
                <img src="../assets/homepage/email.png" class="ms-3"style="width: 40px;" >
              </a>
              <a href="#" style="text-decoration: none;">
                <img src="../assets/homepage/instagram.png" class="ms-3"style="width: 40px;" >
              </a>
              <a href="#" style="text-decoration: none;">
                <img src="../assets/homepage/facebook.png" class="ms-3"style="width: 40px;" >
              </a>
            </div>
          </div>
        </div>
      </footer>
      <!-- Akhir Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
<?php
     if(isset($_POST['pilih'])){
        $Pembeli = $_POST ['Pembeli'];
        $id_barang = $_POST ['id_barang'];
        $querySold =  "UPDATE produk SET status_barang = 'Sold Out' WHERE id_barang = '$id_barang'";
        $result = mysqli_query(connection(),$querySold);

        $queryHis = "UPDATE transaksi  SET id_pembeli = '$Pembeli' where id_barangTerjual = '$id_barang'"; 
        $result2 = mysqli_query(connection(),$queryHis);

     }
?>
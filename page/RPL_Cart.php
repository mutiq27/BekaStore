<?php
session_start();
include ('RPL_Connect.php');
$id_user = $_SESSION['id_user'];
        if (isset($_GET['id_barang'])) {
            //query SQL menampilkan barang
            $id_barang_upd = $_GET['id_barang'];
            $query = "SELECT * FROM produk WHERE id_barang = '$id_barang_upd'";
            
            //eksekusi query
            $result = mysqli_query(connection(),$query);

            while($data = mysqli_fetch_array($result)):
                $id_barang = $data['id_barang'];
                // $kode_user = $data['kode_user'];
                $kode_user = $_SESSION['id_user'];
                $nama_barang = $data['nama_barang'];
                $harga_barang = $data['harga'];
                $id_penjual = $data['kode_user'];
                $status_barang = $data['status_barang'];

            //query menambahkan ke table cart
            $queryCart = "INSERT INTO cart (kode_barang, kode_pembeli, status_barang) VALUES ('$id_barang', '$kode_user', '$status_barang')";

             $result2 = mysqli_query(connection(),$queryCart);
            endwhile; 

            
        }
    
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/keranjang.css">
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


      <!-- Awal Keranjang -->

      <!-- Awal Breadcrumb Product -->
      <div class="container">
        <nav aria-label="breadcrumb" style="background-color: #f2f2f2;" class="mt-3">
            <ol class="breadcrumb p-3">
              <li class="breadcrumb-item"><a href="Catalog.php" class="text-decoration-none">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
            </ol>
          </nav>
      </div>
      <!-- Akhir Breadcrumb Product -->

      <!--Awal Keranjang-->
      <div class="container">
        <div class="row row-produk">
            <div class="col table-responsive mt-4 mx-3">
                <table class="table ">
                    <thead class="table-dark">
                      <tr>
                        <th scope="col" class="th-header">Hapus</th>
                        <th scope="col" class="th-header">Gambar</th>
                        <th scope="col"class="th-header">Produk</th>
                        <th scope="col"class="th-header">Harga</th>
                        <th scope="col"class="th-header">ID Penjual</th>
                        <th scope="col"class="th-header">Kontak Penjual</th>
                        <th scope="col"class="th-header">Status</th>
                      </tr>
                    </thead>
                    <tbody class="align-middle">
                    <?php
                        $cart = "select cart.id_cart,produk.nama_barang, produk.harga, pengguna.nama_user, pengguna.id_user, cart.status_barang, pengguna.no_tlp, produk.kode_user, produk.foto
                        from cart
                        join produk on cart.kode_barang = produk.id_barang
                        join pengguna on pengguna.id_user = cart.kode_pembeli
                        where cart.kode_pembeli= '" . $id_user . "' ";
                        $result3 = mysqli_query(connection(),$cart);
                    ?>
                    <?php while($data = mysqli_fetch_array($result3)): ?>
                      <tr>
                        <th scope="row"> <a href="<?php echo "RPL_Cart_del.php?id_cart=".$data['id_cart']; ?>"><i class="fa-solid fa-circle-xmark fs-4 text-dark"></i></a> </th>
                        <td> <img src='upload/<?php echo $data['foto']?>'class="img-keranjang"></td>
                        <td><?php echo $data['nama_barang'];  ?></td>
                        <td>RP. <?php echo $data['harga'];  ?></td>
                        <td><?php echo $data['kode_user']; ?></td>
                        <td> <a href="https://api.whatsapp.com/send?phone=<?php echo $data['no_tlp'];?>"  class="text-decoration-none text-dark">KONTAK</a> </td>
                        <td ><?php echo $data['status_barang'];  ?></td>
                      </tr>
                     <?php endwhile; ?>
                    </tbody>
                  </table>
            </div>
        </div>
      </div>

      <!--Akhir Keranjang-->

 

      <!-- Akhir Detail Product -->

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



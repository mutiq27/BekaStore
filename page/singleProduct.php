<?php 
session_start();
include ('RPL_Connect.php');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_barang'])) {
        //query SQL menampilkan barang
        $id_barang_upd = $_GET['id_barang'];
        
    $query = "SELECT produk.id_barang, produk.nama_barang, produk.harga, produk.kategori, produk.detail, produk.foto, pengguna.nama_user, pengguna.alamat_user, pengguna.no_tlp
      from produk
      join pengguna on produk.kode_user = pengguna.id_user 
      where id_barang= '$id_barang_upd'";
      $result = mysqli_query(connection(),$query);
    }
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
    <link rel="stylesheet" href="../css/styleProduk.css">
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
              <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Akhir Navbar -->

      <!-- Awal Detail Product -->

      <!-- Awal Breadcrumb Product -->
      <div class="container">
        <nav aria-label="breadcrumb" style="background-color: #f2f2f2;" class="mt-3">
            <ol class="breadcrumb p-3">
              <li class="breadcrumb-item"><a href="Catalog.php" class="text-decoration-none">Home</a></li>
              <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Kategori</a></li>
              <li class="breadcrumb-item active" aria-current="page">Produk</li>
            </ol>
          </nav>
      </div>
      <!-- Akhir Breadcrumb Product -->

      <!-- Awal Single Product -->
      <?php while($data = mysqli_fetch_array($result)): ?>
      <div class="container">
        <div class="row row-produk">
            <div class="col-lg-5">
                <figure class="figure">
                    <!-- <img src="../assets/catSH/img1.jpg" class="figure-img img-fluid rounded" alt="..."> -->
                    <img src='upload/<?php echo $data['foto']?>' class="figure-img img-fluid rounded">
                  </figure>
            </div>
            <div class="col-lg-7">
                <h4><?php echo $data['nama_barang'];  ?></h4>
                <div class="garis-nama"></div>
                <div class="deskripsi"><?php echo $data['detail'];  ?></div>
                
                <h3 class="text-muted mb-3">Rp <?php echo $data['harga'];  ?></h3>

                <!-- <button type="button" class="btn btn-dark btn-sm">
                    <i class="fa-solid fa-minus"></i> 
                </button>
               
                <span class="mx-2"> 1 </span>
                <button type="button" class="btn btn-warning btn-sm">
                    <i class="fa-solid fa-plus"></i>
                </button> -->
                <!-- <span class="mx-2">Tersisa 1 Barang</span> --> 

                <div class="btn-produk mt-5">
                    <a href="<?php echo "RPL_Cart.php?id_barang=".$data['id_barang']; ?>" class="btn btn-dark text-white btn-lg me-2 btn-custom"><i class="fa-solid fa-cart-shopping fs-6 me-2"></i>Add Cart</a>
                    <!-- <a href="#" class="btn btn-warning text-white me-2 btn-lg btn-custom" style="fo btn-custom-size: 14px;">Buy</a> -->
                </div>
                <div class="info-penjual">
                  <h5>Informasi Penjual</h5>
                  <ul>
                    <li>Nama Penjual: <?php echo $data['nama_user'];  ?> </li>
                    <li>Alamat      : <?php echo $data['alamat_user'];  ?></li>
                  </ul>
                </div>
            </div>
        </div>
      </div>
      <?php endwhile ?>
      <!-- Akhir Single Product -->

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


<!-- 
-->
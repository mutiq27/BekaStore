<?php
    session_start();
    $id_user = $_SESSION['id_user'];
   include ('RPL_Connect.php');
   $query="SELECT pengguna.id_user, pengguna.nama_user, transaksi.tanggal_transaksi, produk.nama_barang, produk.tanggal_upload, produk.foto, produk.harga
   from transaksi
   join pengguna on transaksi.id_penjual = pengguna.id_user
   join produk on transaksi.id_barangTerjual = produk.id_barang where id_pembeli='" . $id_user . "' ";
   $result = mysqli_query(connection(), $query);
   $jumProduk = mysqli_num_rows($result);
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
              <li class="breadcrumb-item active" aria-current="page">History Pembelian</li>
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
                        <th scope="col">No</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Produk</th>
                        <th>Harga</th>
                        <th scope="col">ID Penjual</th>
                        <th>Nama Penjual</th>
                        <th scope="col">Tanggal</th>
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
                                while($data = mysqli_fetch_array($result)) { ?>
                        
                    <tr>
                        <td>
                            <?php echo $jumlah; ?>
                        </td>
                        <td> <img src="upload/<?php echo $data['foto']; ?>" class="img-history">  </td>
                        <td><?php echo $data['nama_barang']; ?></td>
                        <td><?php echo $data['harga']; ?></td>
                        <td><?php echo $data['id_user']; ?></td>
                        <td><?php echo $data['nama_user']; ?></td>
                        <td> <?php echo $data['tanggal_transaksi']; ?></td>
                       
                      </tr>
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

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <th>No.</th>
            <th>Gambar</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>ID Penjual</th>
            <th>Nama Penjual</th>
            <th>Tanggal Transaksi</th>
        </thead>
        <tbody>
            <?php
               if ($jumProduk==0){
                 ?>
                <tr>
                    <td colspan=5 class="text-center"> Data Produk tidak tersedia</td>
                </tr>
                <?php  }
                    else{
                        $jumlah=1;
                         while($data = mysqli_fetch_array($result)) { ?>
                
            <tr>
                <td>
                    <?php echo $jumlah; ?>
                </td>
                <td>
                    <img src="upload/<?php echo $data['foto']; ?>" height="100px">
                </td>
                <td>
                    <?php echo $data['nama_barang']; ?>
                </td>
                <td>
                    <?php echo $data['harga']; ?>
                </td>
                <td>
                    <?php echo $data['id_user']; ?>
                </td>
                <td>
                     <?php echo $data['nama_user']; ?>
                </td>
                <td>
                <?php echo $data['tanggal_transaksi']; ?>
                </td>
            </tr>
            <?php
                    $jumlah++;
                }
            }
            ?>
        </tbody>
    </table>
</body>
</html> -->


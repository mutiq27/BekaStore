<?php
   session_start();
   include ('RPL_Connect.php');

   $id_user = $_SESSION['id_user'];
    // $id_user = '15';
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_barang'])) {
        $id_barang = $_GET['id_barang'];

        $queryUpd = "SELECT* FROM produk where id_barang = '$id_barang'";
        $result = mysqli_query(connection(),$queryUpd);
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
    <link rel="stylesheet" href="../css/upload.css">
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
                <a class="nav-link active" aria-current="page" href="#">Home</a>
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
              <li class="breadcrumb-item"><a href="RPL_LisItem.php" class="text-decoration-none">List Item</a></li>
              <li class="breadcrumb-item"><a href="RPL_LisItem_upd.php" class="text-decoration-none">Update</a></li>
            </ol>
          </nav>
      </div>
      <!-- Akhir Breadcrumb Product -->

      <!-- Awal History Beli -->
      <div class="container mt-5">
        <!-- <div class="my-5 col-12 col-md-6"> -->
          <div class="main-upload">
          <div class="title-upload">
            <h3>Upload Produk</h3>
          </div>

          <form action="RPL_ListItem_upd_save.php" method="post" enctype="multipart/form-data" class="form-upload">
          <?php while($data = mysqli_fetch_array($result)): ?>
              <div class="label">
                  <label for="nama">Nama Barang</label>
                  <input type="text" id="nama" name="nama" value="<?php echo $data['nama_barang'];  ?>"class="form-control input-label">
              </div>
              <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>">
              <div class="label">
                  <label for="kategori">Kategori</label>
                  <select name="kategori" id="kategori" class="form-control input-label">
                      <option value="">Pilih Kategori</option>
                      <option value="Secondhand">Secondhand</option>
                      <option value="Grant">Grant</option>
                      <option value="Dormitory">Dormitory</option>
                  </select>
              </div>
              <div class="label">
                  <label for="harga">Harga</label>
                  <input type="number" name="harga" id="harga" value="<?php echo $data['harga'];  ?>" class="form-control input-label">
              </div>
              <div class="label">
                  <label for="foto">Foto</label>
                  <input type="file" name="foto" id="foto"  class="form-control input-label" >
                  <input type="hidden" name="foto2" value="<?php echo $data['foto']; ?>">
              </div>
              <div class="label">
                <img id="img" src='upload/<?php echo $data['foto']?>' height="200">
              </div>
              <div class="label">
                  <label for="detail">Deskripsi Barang</label>
                  <textarea name="detail" id="detail"   class="form-control input-textarea" ><?php echo $data['detail'];  ?></textarea>
              </div>
              <div class="button">
                  <button type="sumbit" class="btn btn-primary btn-upload" name="simpan">Simpan</button>
              </div>
          </form>
          <?php endwhile; ?>
          </div>
           
        <!-- </div> -->
        
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
  <script>
    let img = document.getElementById('img');
    let input = document.getElementById('foto');

    input.onchange = (e) =>{
      if (input.files[0])
      {img.src = URL.createObjectURL(foto.files[0]);
      };
    }
  </script>
  </body>
</html>

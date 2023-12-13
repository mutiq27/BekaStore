<?php
    session_start();
    include ('RPL_Connect.php');
    $queryProduk = "SELECT id_barang, nama_barang, kategori, foto, harga, detail FROM produk where kategori = 'Grant' and not status_barang = 'Sold Out' ";
    $result = mysqli_query(connection(),$queryProduk);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
     <link rel='stylesheet' href='https://pro.fontawesome.com/releases/v5.10.0/css/all.css'>
     
     <link rel="stylesheet" href="../css/Catalog_style.css">
    <title>BekaStore</title>
</head>
<body>
    <div class="main-container d-flex">
        <div class="sidebar Sidebar">
                <div class="Header">
                    <div class="List_Item">
                        <div id="Menu-button" >
                            <input type="checkbox" id="Menu-checkbox">
                            <label for="Menu-checkbox" id="Menu-label" class="Button">
                                
                                <div id="Cube">
                                   
                                </div>
                            </label>
                        </div>
                        
                    </div>
                   
                </div>
                <div class="Main">
                    <div class="List_Item">
                        <a href="RPL_profile.php">
                            <img src="../assets/sideBar/user.png" alt="" class="Icon">
                            <span class="Description">Profile</span>  
                        </a>
                    </div>
                    <div class="List_Item">
                        <a href="RPL_Cart.php">
                            <img src="../assets/sideBar/cart.png" alt="" class="Icon">
                            <span class="Description">Cart</span>  
                        </a>
                    </div>
                    <div class="List_Item">
                        <a href="RPL_Upload.php">
                            <img src="../assets/sideBar/upload.png" alt="" class="Icon">
                            <span class="Description">Upload</span>  
                        </a>
                    </div>
                    <div class="List_Item">
                        <a href="RPL_ListItem.php">
                            <img src="../assets/sideBar/list.png" alt="" class="Icon">
                            <span class="Description">List Item</span>  
                        </a>
                    </div>
                    <div class="List_Item">
                        <a href="RPL_History_jual.php">
                            <img src="../assets/sideBar/historyseller.png" alt="" class="Icon">
                            <span class="Description">History Penjualan</span>  
                        </a>
                    </div>
                    <div class="List_Item">
                        <a href="RPL_History_beli.php">
                            <img src="../assets/sideBar/historybuyer.png" alt="" class="Icon">
                            <span class="Description">History Pembelian</span>  
                        </a>
                    </div>
                    <div class="List_Item">
                        <a href="RPL_LogOut_trans.php">
                            <img src="../assets/sideBar/logout.png" alt="" class="Icon">
                            <span class="Description">Log Out</span>  
                        </a>
                    </div>
    
                </div>
            
        </div>
        
        <div class="content">
            <!-- Awal Navbar -->

            <nav class="navbar navbar-expand-lg navbar-light bg-light main-color">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#"> <img src="shopping-cart.png" width="50" height="50" class="me-2">
                    Beka<strong>Store</strong>
                  </a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="d-flex ms-auto my-4 my-lg-0">
                      <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search">
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
              <!-- Awal Catalog -->
              <section id="products" class="mt-5">
                <div class="prod">
                <h2 style="margin:0px 350px 40px 350px; padding: 20px 0px 20px 0px; font-weight: bold; background-color: #F6F1E9; border-radius: 35px; text-align: center;">Grant</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">

                <?php
                        if (isset($_GET['cari'])){
                            $cari = $_GET['cari'];
                            $querySearch = "SELECT id_barang, nama_barang, kategori, foto, harga, detail FROM produk WHERE kategori = 'Grant' AND NOT status_barang = 'Sold Out' AND (nama_barang LIKE '%$cari%' OR detail LIKE '%$cari%')";
                            $result = mysqli_query(connection(), $querySearch);

                        }    
                ?>

                <?php while($data = mysqli_fetch_array($result)): ?>
                  <?php $_SESSION['id_barang'] = $data['id_barang']?>
                  <div class="col-sm-6 col-md-4">
                  <a href="<?php echo "singleProduct.php?id_barang=".$data['id_barang']; ?>" class="text-decoration-none text-dark">
                    <div class="card h-100  shadow custom-card text-center">
                      <img src="upload/<?php echo $data['foto']?>" alt="" class="card-img-top custom-bg img-fluid w-auto mx-auto my-auto ">
                      <div class="card-body">
                        <h4 class="card-tittle text-truncate"><?php echo $data['nama_barang'];  ?></h4>
                        <p class="card-text text-truncate"><?php echo $data['detail'];  ?></p>
                      </div>
                      <div class="card-footer custom-footer">
                        <div class="float-start">
                          <h4 class="custom-highlight">Rp <?php echo $data['harga'];  ?></h4>
                        </div>
                        <div class="float-end">
                        <a href="<?php echo "RPL_Cart.php?id_barang=".$data['id_barang']; ?>"  class="text-decoration-none text-white"><button class="btn btn-primary rounded-3 custom-btn"><i class="fas fa-shopping-cart"></i> ADD CART </a></button></a>
                        </div>
                      </div>
                    </div> 
                    </a> 
                  </div>
                  
                  <?php endwhile ?>

                </div>
              </section>
              <!-- Akhir Catalog -->
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
        </div>
    </div>
    <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

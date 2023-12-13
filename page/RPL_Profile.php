<?php
    include ('RPL_Connect.php');
    session_start();
    $id_user = $_SESSION['id_user'];
    $query="SELECT * FROM pengguna where id_user = '$id_user'";
    $result = mysqli_query(connection(), $query);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/profile.css">
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

      <!-- Awal Profile -->

      <div class="container" >
        <nav aria-label="breadcrumb" style="background-color: #F6F1E9; color: black;" class="mt-5 ml-2 mr-2">
            <ol class="breadcrumb p-3">
              <li class="breadcrumb-item"><a href="Catalog.php" class="text-decoration-none">Home</a></li>
              <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Edit Profile</a></li>
            </ol>
          </nav>
      </div>
      
      <div class="container" style="height:700px">
        <form class="form-container" action="" method="POST" enctype="multipart/form-data" >
        <?php while($data = mysqli_fetch_array($result)): ?>
            <table cellspacing="3" cellpadding="5" align="center">
                <thead>
                    <tr align="center" bgcolor="787A91" style="margin-right: 100px; color: black; background-color: #FDCD94;">
                        <td width="900">   
                            <h3 class="text-judul"><?php echo $data['nama_user'];  ?></h3>
                            <h5><?php echo $data['email'];  ?></h5>
                        </td>
                    </tr>
                    <tr>
                        
                    </tr>
                </thead>
            </table>
            
          <div class="row mt-5">
            <div class="col-md-6">
              <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user-plus"></i></i></span>
                  <input type="text" class="form-control" name="nama_user" id="exampleInputEmail1" value="<?php echo $data['nama_user'];  ?>" aria-describedby="emailHelp" placeholder="Nama Lengkap">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                  <input type="password" class="form-control" name="password" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jika ingin merubah password, silahkan input Password Baru Anda">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                  <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="<?php echo $data['email'];  ?>" aria-describedby="emailHelp" placeholder="Email">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">Ulangi Password</label>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                  <input type="password" class="form-control" name="cpassword" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ulangi Password">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">No. Telp</label>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mobile-screen-button"></i></span>
                  <input type="text" class="form-control" name="no_tlp" id="exampleInputEmail1" value="<?php echo $data['no_tlp'];  ?>" aria-describedby="emailHelp" placeholder="No. Telp">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-house-chimney"></i></span>
                  <input type="text" class="form-control" name="alamat_user" id="exampleInputEmail1" value="<?php echo $data['alamat_user'];  ?>" aria-describedby="emailHelp" placeholder="Alamat">
                </div>
              </div>
            </div>
          </div>
          <?php endwhile ?>
  
          <div class="mt-5">
            <div class="row">
              <div class="col-md-4 d-grid button-save">
                <button  style="width: 150px; height: 50px; font-size: 20px;" type="submit" class="btn btn-outline-primary">Save</button>
              </div>
            </div>
          </div>
        </form>
      </div>
        


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

<?php
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
            $nama= $_POST['nama_user'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            $no_tlp = $_POST['no_tlp'];
            $alamat = $_POST['alamat_user'];
        if (!empty($password) && !empty($cpassword)) {
            if($password==$cpassword){
                $Epassword = password_hash($password, PASSWORD_DEFAULT);
                $query = "UPDATE pengguna set email='$email', nama_user='$nama', password='$Epassword', no_tlp='$no_tlp', alamat_user='$alamat' where id_user='$id_user'"; 
                $result = mysqli_query(connection(),$query);
                  if ($result) {
                      ?>
                      <div class="alert alert-warning mt-3 text-center" role="alert">
                          SUCSESS
                      </div>
                    <?php
                  }
                  else{
                    ?>
                    <div class="alert alert-warning mt-3 text-center" role="alert">
                      ERROR!
                    </div>
                  <?php
                  }
          }
          else{
              ?>
              <div class="alert alert-warning mt-3 text-center" role="alert">
                Password Tidak Cocok
              </div>
            <?php
                }
        } else {
            $query = "UPDATE pengguna set email='$email', nama_user='$nama', no_tlp='$no_tlp', alamat_user='$alamat' where id_user='$id_user'"; 
            $result = mysqli_query(connection(),$query);
            if ($result) {
                ?>
                <div class="alert alert-warning mt-3 text-center" role="alert">
                    SUCSESS
                </div>
              <?php
            }
            else{
              ?>
              <div class="alert alert-warning mt-3 text-center" role="alert">
                ERROR!
              </div>
            <?php
            }
        }
    }

?>
<?php 
 
     include ('RPL_Connect.php');

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  $email ="";
    $nama= "";
     $password = "";
    $cpassword = "";
    $no_tlp = "";
    $alamat = "";
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $nama= $_POST['nama_user'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $no_tlp = $_POST['no_tlp'];
    $alamat = $_POST['alamat'];
    $status = "Available";

      //query SQL
      if(isset($_POST['signupbtn']) && isset($_POST['agree']) ){
       

            if($password==$cpassword){
              $sql="SELECT*FROM pengguna where email='$email'";
              $hasil=mysqli_query(connection(), $sql);
              $data=mysqli_num_rows($hasil);
              if($data==0){
                $Epassword = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO pengguna (email, nama_user, password, no_tlp, alamat_user)
                VALUES('$email', '$nama', '$Epassword', '$no_tlp','$alamat')"; 
                $result = mysqli_query(connection(),$query);
                  if ($result) {
                     header('location: PHP_Login.php');
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
                      Email sudah terdaftar
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
                
              
         }    
        else{
          ?>
            <div class="alert alert-warning mt-3 text-center" role="alert">
              Setujui dahulu Syarat & Ketentuan
            </div>
          <?php
        }
        
      if(isset($_POST['delete']) ){
        $email ="";
        $nama= "";
        $password = "";
        $cpassword = "";
        $no_tlp = "";
        $alamat = "";
      }
      }  
?>
<?php
  
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styleRegister.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <title>BekaStore</title>
  </head>

  <body>
    <div class="container">
      <form action="PHP_SignUp.php" method="POST" class="form-container">
        <h3 class="text-judul">Daftar</h3>
        <div class="row mt-5">
          <div class="col-md-6">
            <div class="mb-4">
              <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user-plus"></i></i></span>
                <input type="text" class="form-control" name="nama_user" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap" value="<?php echo $nama; ?>" require>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-4">
              <label for="exampleInputEmail1" class="form-label">Password</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                <input type="password" class="form-control" name="password" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password" value="<?php echo $password; ?>" required="required">
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
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email"value="<?php echo $email; ?>" required="required">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-4">
                <!-- buat program untuk melakukan pengecekkan ulang password -->
              <label for="exampleInputEmail1" class="form-label">Ulangi Password</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                <input type="password" class="form-control" name="cpassword" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ulangi Password"value="<?php echo $cpassword; ?>"required="required">
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
                <input type="text" class="form-control" name="no_tlp" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="No. Telp" value="<?php echo $no_tlp; ?>" required="required">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-4">
              <label for="exampleInputEmail1" class="form-label">Alamat</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-house-chimney"></i></span>
                <input type="text" class="form-control" name="alamat" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat" value="<?php echo $alamat; ?>" required="required">
              </div>
            </div>
          </div>
        </div>

        <div class="mb-3 form-check">
          <input type="checkbox" name="agree" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Saya menyetujui <a href="#" style="text-decoration: none;" ><span class="red-text" >Syarat & Ketentuan</span> </a>yang berlaku</label>
        </div>
        
        <div class="mt-5">
          <div class="row">
            <div class="col-md-6 d-grid">
                <!-- buat syaerat agar button signup dapat diproses jika checkbox telah di klik -->
              <button type="submit" name="signupbtn" class="btn btn-outline-primary">Sign Up</button>
            </div>
            <div class="col-md-6 d-grid">
              <button type="reset" name="delete" class="btn btn-outline-danger">Delete Data</button>
            </div>
          </div>
          <div class="mt-3">Sudah memiliki Akun? <a href="PHP_Login.php" class="text-hover">Login di sini</a></div>
        </div>
      </form>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
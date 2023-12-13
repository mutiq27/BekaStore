<?php
  session_start();
  include ('RPL_Connect.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">

    <title>Online Shop | BekaStore</title>
  </head>

  <body>
    <div class="container">
      <form action="" method="POST" class="form-container">
          <h3 class="textJudul mb-4 mt-2">Masuk</h3>
            
          <!-- input email -->
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label textForm">E-mail</label>
              <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-envelope"></i></span>
                  <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan E-mail">
              </div>
            </div>

            <!-- input pass -->
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label textForm">Password</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Masukkan Password">
              </div>

              <!-- link lupa password -->
            <div style="margin-top: -10px" class="text-end">
              <a href="PHP_Login_fgt_pwd.php" class="textForm text-hover">Lupa Password</a>
            </div>

            <!-- button masuk -->
            <div class="d-grid mt-4">
              <button type="submit" name="loginbtn" class="btn btn-outline-primary textForm" class="textForm text-hover">Masuk</a></button>
            </div>

            <!-- link ke daftar -->
            <div class="mt-2">
              <span class="textForm">Belum punya akun? <a href="PHP_SignUp.php" class="textForm text-hover">Daftar</a></span>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
  <div class="mt-3 container text-center" style="width: 1000px">
  <?php
      if(isset($_POST['loginbtn'])){
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $query = mysqli_query(connection(),"SELECT * FROM pengguna WHERE email='$email'");
        $rows = mysqli_num_rows($query);
        $data = mysqli_fetch_array($query);


        if($rows > 0){
            if (password_verify($password, $data['password'])){
              echo "BENAR";
              $_SESSION['email'] = $data['email'];
              $_SESSION['id_user'] = $data['id_user'];
              $_SESSION['login'] = true;
              header('location: Catalog.php');
            }
            else{
              ?>
            <div class="alert alert-warning" role="alert">
              Password tidak Sesuai
            </div>
            <?php
          }
      }      
      else{
          ?>
          <div class="alert alert-warning" role="alert">
            Email tidak terdaftar!
          </div>
          <?php
        }
    }
    ?>
</div>
    
  </body>
</html>
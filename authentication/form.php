<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign in & Sign up Form</title>
    <!----------------------------- font-awesome icons ------------------------------->
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!----------------------------- iconify-icon ------------------------------------->
    <script src="https://code.iconify.design/iconify-icon/1.0.5/iconify-icon.min.js"></script>
    <!----------------------------- Custom CSS --------------------------------------->
    <link rel="stylesheet" href="../authentication/CSS/form.css" />
</head>

<body>
    <!--------------------------- Form container Start-------------------------------->
    <div class="containerform">
        <div class="forms-container">
            <div class="signin-signup">
            <?php
session_start();
include 'koneksi.php';
if (isset($_POST['blogin'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $cek_petugas = mysqli_query($koneksi, "SELECT*FROM petugas WHERE username = '$username' AND password = '$password'");

  if (mysqli_num_rows($cek_petugas) > 0) {
    $_SESSION['user'] = mysqli_fetch_array($cek_petugas);
    echo '<script>alert("Login Berhasil!");document.location="../websiteCoding/index.php";</script>';
  } else {
    
    $cek_user = mysqli_query($koneksi, "SELECT*FROM user WHERE username = '$username' AND password = '$password'");

    if (mysqli_num_rows($cek_user) > 0) {
      $_SESSION['user'] = mysqli_fetch_array($cek_user);
      echo '<script>alert("Login Berhasil!");document.location="../websiteCoding/index.php";</script>';
    } else {
      echo '<script>alert("Login Gagal!");</script>';
    }
  }
}
?>
                <!-------------- Signin container Start ----------------------->
                <form class="sign-in-form" id="signin" method="post">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="username" autocomplete="off" id="username" name="username" />
                    </div>
                    <div class="input-field passfield">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" id="password" class="pass1" name="password" />
                        <span>
                            <i class="fa-regular fa-eye "></i>
                        </span>
                    </div>

                    <button type="submit"  class="btn solid" name="blogin">login</button>
                    <p class="social-text">Or Sign in with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
                <!----------------- Signin container End ----------------------->


                        <?php
                            if (isset($_POST['bregis'])) {
                                $namaLengkap = $_POST['namaLengkap'];
                                $email = $_POST['email'];
                                $username = $_POST['username'];
                                $password = md5($_POST['password']);


                                $user = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' || email='$email'"));

                                if ($user > 0) {
                                    echo '<script>alert("Username/Email sudah digunakan");</script>';
                                } else {
                                    $insert = mysqli_query($koneksi, "INSERT INTO user (namaLengkap,email,username,password) VALUES ('$namaLengkap','$email', '$username','$password') ");
                                    if ($insert) {
                                        echo '<script>alert("Register berhasil");</script>';
                                    } else {
                                        echo '<script>alert("Register gagal");</script>';
                                    }
                                }
                            }
                            ?>
                <!---------------- Signup container Start ---------------------->
                <form method="post" class="sign-up-form" id="signup">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field namefield">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="username" autocomplete="off" maxlength="20" id="uname" required/>
                    </div>
                    <div class="input-field namefield">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Full Name" name="namaLengkap" autocomplete="off" maxlength="20" id="fname" required/>
                    </div>
                    <div class="input-field efield">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email"  autocomplete="off" id="ename" required />
                    </div>
                    <div class="input-field passfield">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password"  id="pass" class="pass1" required/>
                        <span>
                            <i class="fa-regular fa-eye "></i>
                        </span>
                    </div>
                    <div class="input-field  passfield">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Confirm Password" id="confirmpass"  name="password" class="pass1"  required/>
                        <span>
                            <i class="fa-regular fa-eye "></i>
                        </span>  
                    </div>
                    <button type="submit" value="Sign up" class="btn signup-btn" name="bregis">Sign Up</button>
                    <p class="social-text">Or Sign up with social platforms</p>
                </form>
                <!----------------- Signup container End --------------------->
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Create Account</h3>
                    <p>
                        Sign up if you still don't have an account ... 
                       
                    </p>
                    <button class="btn transparent" id="sign-up-btn" name="bregis">
                        Sign up
                    </button>
                </div>
                <img src="/images/sigup_img.png" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Log in</h3>
                    <p>
                        Sign in here if you already have an account
                        
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                <img src="/images/login.png" class="image" alt="" />
            </div>
        </div>
    </div>
    <!------------------------------ Form container End --------------------------->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../authentication/JS/form.js"></script>
    <script src="..authentication/JS/login.js"></script>
</body>

</html>
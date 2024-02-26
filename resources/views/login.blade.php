<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Tracer Study</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
  <link rel="stylesheet" href="/css/login.css">
</head>
<body>
  <div class="wrapper" >
    <header data-aos="fade-up" data-aos-duration="800">Login</header>
    <form action="#">
      <div class="field email" data-aos="fade-up" data-aos-duration="900">
        <div class="input-area">
          <input type="text" placeholder="NIM">
          <i class="icon fas fa-envelope"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <div class="error error-txt">NIM Tidak Boleh Kosong</div>
      </div>
      <div class="field password" data-aos="fade-up" data-aos-duration="1100">
        <div class="input-area">
          <input type="password" placeholder="Password">
          <i class="icon fas fa-lock"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <div class="error error-txt">Password Tidak Boleh Kosong</div>
      </div>
      <div data-aos="fade-up" data-aos-duration="1300" class="pass-txt"><a href="index.php">Lupa Password?</a></div>
      <input data-aos="fade-up" data-aos-duration="1500" type="submit" value="Login">
    </form>
    <div data-aos="fade-up" data-aos-duration="1600" class="sign-txt">Belum Memiliki Akun? <a href="register.php">Daftar Sekarang</a></div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script src="/js/login.js"></script>

</body>
</html>

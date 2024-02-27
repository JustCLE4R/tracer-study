<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache"/>
  <meta http-equiv="Expires" content="0"/>
  <title>Login Tracer Study</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
  <link rel="stylesheet" href="/css/login.css">
</head>
<body>
  <div class="wrapper" >
    <header data-aos="fade-up" data-aos-duration="800">Login</header>
    <form action="/login" method="post">
      @csrf
      <div class="field email @error('nim') shake @enderror" data-aos="fade-up" data-aos-duration="900">
        <div class="input-area">
          <input type="text" name="nim" placeholder="NIM" oninput="validateNumericInput(this)" value="{{ $errors->has('nim') ? '' : old('nim') }}" maxlength="10">
          <i class="icon fas fa-envelope"></i>
          @error('nim')
            <i class="error error-icon fas fa-exclamation-circle"></i>
          @enderror
        </div>
        @error('nim')
          <div class="error error-txt">{{ $message }}</div>
        @enderror
      </div>
      <div class="field password @error('password') shake @enderror" data-aos="fade-up" data-aos-duration="1100">
        <div class="input-area">
          <input type="password" name="password" placeholder="Password">
          <i class="icon fas fa-lock"></i>
          @error('password')
            <i class="error error-icon fas fa-exclamation-circle"></i>
          @enderror
        </div>
        @error('password')
          <div class="error error-txt">{{ $message }}</div>
        @enderror
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

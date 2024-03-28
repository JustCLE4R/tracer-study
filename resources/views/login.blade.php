<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="cover">
      <div class="front">
        <img src="https://newuinsu.uinsu.ac.id/wp-content/uploads/2024/02/Graduation.jpg" alt="">
        <div class="text">
          <span class="text-1">Selamat Datang <br> Di Website Tracer Study UINSU</span>
        </div>
      </div>      
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
              <div class="row justify-content-between">
                <div class="col-2">
                  <div class="title">Login </div>
                </div>
                <div class="col-3">
                  <span><img src="/img/logo.png" width="100px" alt=""></span>
                </div>
              </div>
            @if (session()->has('error'))
            <div style="color: red; font-weight: bold;" role="alert" data-aos="fade-up" data-aos-duration="800">
              {{ session()->get('error') }}
            </div>
            @endif
            <form action="/login" method="post">
              @csrf
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="text" name="nim" placeholder="Masukan nim.." oninput="validateNumericInput(this)" value="{{ $errors->has('nim') ? '' : old('nim', 41144013) }}" maxlength="12" required>

                </div>
                @error('nim')
                <div class="error error-txt">{{ $message }}</div>
                @enderror
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="password" placeholder="Masukan Password" required>

                </div>
                @error('password')
                  <div class="error error-txt">{{ $message }}</div>
                @enderror
                <div class="button input-box">
                  <input type="submit" value="Login">
                </div>                
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>

  <script>
    const imageUrls = [
      'https://newuinsu.uinsu.ac.id/wp-content/uploads/2024/02/2-11.jpg',
      'https://newuinsu.uinsu.ac.id/wp-content/uploads/2024/02/Graduation.jpg',
      'https://newuinsu.uinsu.ac.id/wp-content/uploads/2024/02/IMG_2051.jpg',
      'https://newuinsu.uinsu.ac.id/wp-content/uploads/2024/02/uin.png'
    ];
    
    let currentIndex = 0;
    
    function changeBackground() {
      document.body.style.backgroundImage = `url('${imageUrls[currentIndex]}')`;
      currentIndex = (currentIndex + 1) % imageUrls.length;
    }
    
    const firstImage = new Image();
    firstImage.src = imageUrls[0];
    firstImage.onload = function() {
      changeBackground();
      setInterval(changeBackground, 5000);
    };
    </script>
</body>
</html>


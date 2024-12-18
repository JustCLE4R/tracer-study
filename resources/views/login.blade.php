<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <div class="cover">
            <div class="front">
                <img src="https://preview.uideck.com/items/bliss/assets/img/hero/hero-img.svg" alt="">

                <div class="text" data-aos="fade-up" data-aos-duration="800">
                    <div class="carousel">
                        <span class="text-1">Selamat Datang <br> Di Website Tracer Study UINSU <br><a class="kunjungi"
                                href="/">Kunjungi Tracer <i class="fa-regular fa-paper-plane"></i></a></span>
                        <span class="text-1" style="display: none;">Terima Kasih <br> Telah Menggunakan Layanan
                            Kami</span>
                        <!-- Add additional text items here -->
                    </div>
                    <div class="controls">
                        <i class="fas fa-chevron-left prev"></i>
                        <i class="fas fa-chevron-right next"></i>
                    </div>
                </div>

            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="row justify-content-between" data-aos="fade-up" data-aos-duration="800">
                        <div class="col-2">
                            <div class="title">Masuk </div>
                        </div>
                        <div class="col-3">
                            <span><img
                                    src="https://newuinsu.uinsu.ac.id/wp-content/uploads/2024/02/uin-dan-blu-png-2.png"
                                    alt=""></span>
                        </div>
                    </div>
                    @if (session()->has('error'))
                    <div style="color: red; font-weight: bold;" role="alert" data-aos="fade-up"
                        data-aos-duration="1000">
                        {{ session()->get('error') }}
                    </div>
                    @endif
                    <form action="/login" method="post">
                        @csrf
                        <div class="input-boxes">
                            <div class="input-box" data-aos="fade-up" data-aos-duration="1200">
                                <i class="fas fa-envelope"></i>
                                <input type="text" name="nim" placeholder="Masukan NIM" value="{{ $errors->has('nim') ? '' : old('nim') }}" maxlength="20" required>
                                {{-- <input type="text" name="nim" placeholder="Masukan NIM" value="41144013" maxlength="20" required> --}}
                            </div>
                            @error('nim')
                            <div class="error error-txt">{{ $message }}</div>
                            @enderror
                            <div class="input-box" data-aos="fade-up" data-aos-duration="1400">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" placeholder="Masukan Password" required>
                                {{-- <input type="password" name="password" placeholder="Masukan Password" value="12345" required> --}}
                            </div>
                            @error('password')
                            <div class="error error-txt">{{ $message }}</div>
                            @enderror
                            <div class="button input-box" data-aos="fade-up" data-aos-duration="1600">
                                <input type="submit" value="Masuk">
                            </div>

                            {{-- add download guide --}}
                            <div data-aos="fade-up" data-aos-duration="1800">
                                <p style="text-align: center; font-size: .7rem;"><a href="/document/Panduan Penggunaan Aplikasi Tracer Study.pdf" download>Download Panduan Tracer</a></p>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
    $(document).ready(function() {
        AOS.init();
        var currentIndex = 0;
        var texts = $(".carousel").children();

        function showText(index) {
            texts.hide();
            $(texts[index]).fadeIn();
        }

        function nextText() {
            currentIndex = (currentIndex + 1) % texts.length;
            showText(currentIndex);
        }

        function prevText() {
            currentIndex = (currentIndex - 1 + texts.length) % texts.length;
            showText(currentIndex);
        }

        $(".next").click(function() {
            nextText();
        });

        $(".prev").click(function() {
            prevText();
        });

        // Autoplay functionality
        setInterval(function() {
            nextText();
        }, 7000);

        // Show initial text
        showText(currentIndex);
    });
    </script>
</body>

</html>
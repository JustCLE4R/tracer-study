<!-- Footer Start -->

  <footer class="bg-light rounded-top p-4 mt-4">
    <div class="row">
      <div class="col-12 col-sm-6 text-center text-sm-start">
        &copy; <a href="#" class="text-success">Pustipada</a>, 2024 All Right Reserved.
      </div>
    </div>
  </footer>

  <a href="#" class="scroll-top btn-hover">
    <i class="bi bi-chevron-up"></i>
  </a>

  <script>
    window.onscroll = function () {
            var header_navbar = document.querySelector(".navbar-area");
            var sticky = header_navbar.offsetTop;
    
            if (window.pageYOffset > sticky) {
                header_navbar.classList.add("sticky");
            } else {
                header_navbar.classList.remove("sticky");
            }
    
    
    
            // show or hide the back-top-top button
            var backToTo = document.querySelector(".scroll-top");
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                backToTo.style.display = "flex";
            } else {
                backToTo.style.display = "none";
            }
        };
  </script>

<!-- Footer End -->
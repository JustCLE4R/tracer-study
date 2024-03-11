<!-- Navbar Start -->
<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">

  <a href="#" class="sidebar-toggler flex-shrink-0 text-success">
    <i class="bi bi-justify"></i>
  </a>


  <div class="navbar-nav row justif-content-center align-items-center ms-auto m-2">

      
      <div class="col-8 text-end">
        <a href="">
          <span class="d-none text-success d-lg-inline-flex">{{ Auth::user()->nama }}</span>
        </a>
      </div>
      <div class="col-4 text-start">
        <a href="#" class="">
          <img class="rounded-circle " src="/img/account.png" alt="" width="40vh">        
        </a>
      </div>
      

    
  </div>

</nav>
<!-- Navbar End -->
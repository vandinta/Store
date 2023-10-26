<div class="main-header">
  <!-- Logo Header -->
  <div class="logo-header" data-background-color="blue">
    <a href="" class="logo">
      <h3 class="navbar-brand" style="color: white; margin-left: 50px; font-size: 32px;">Store</h3>
    </a>
    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">
        <i class="icon-menu"></i>
      </span>
    </button>
    <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
    <div class="nav-toggle">
      <button class="btn btn-toggle toggle-sidebar">
        <i class="icon-menu"></i>
      </button>
    </div>
  </div>

  <!-- Navbar Header -->
  <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
    <div class="container-fluid">
      <?php if (isset($_COOKIE["access_token"])) { ?>
        <a></a>
        <a class="nav-link text float-right logout-user" style="color: white;">Logout</a>
      <?php } else { ?>
        <a></a>
        <a class="nav-link text float-right" style="color: white;" href="{{ route('login') }}">Login</a>
      <?php } ?>
    </div>
  </nav>
  <!-- End Navbar -->

</div>
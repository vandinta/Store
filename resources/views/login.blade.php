<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Sign In - Store</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="{{ asset('assets/dashmin/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/dashmin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="{{ asset('assets/dashmin/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="{{ asset('assets/dashmin/css/style.css') }}" rel="stylesheet">
</head>

<body>
  <div class="bg-white d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <!-- Spinner End -->

    <!-- Sign In Start -->
    <div class="container-fluid">
      <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
          <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
            @if ($message = Session::get('error'))
            <div class="alert alert-danger">
              <p>{{ $message }}</p>
            </div>
            @endif
            @if ($message = Session::get('belum_login'))
            <div class="alert alert-danger">
              <p>{{ $message }}</p>
            </div>
            @endif
            <div class="d-flex align-items-center justify-content-between mb-3">
              <h2 class="text-primary">Store</h2>
            </div>
            <form id="login-form">
              @csrf
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                <label for="email">Email</label>
              </div>
              <div class="form-floating mb-4">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <label for="password">Password</label>
              </div>
              <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Sign In End -->
  </div>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets/dashmin/lib/chart/chart.min.js') }}"></script>
  <script src="{{ asset('assets/dashmin/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('assets/dashmin/lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/dashmin/lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/dashmin/lib/tempusdominus/js/moment.min.js') }}"></script>
  <script src="{{ asset('assets/dashmin/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
  <script src="{{ asset('assets/dashmin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

  <!-- Template Javascript -->
  <script src="{{ asset('assets/dashmin/js/main.js') }}"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const loginForm = document.getElementById("login-form");

      loginForm.addEventListener("submit", function(e) {
        e.preventDefault();

        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;

        const headers = new Headers();

        fetch("http://127.0.0.1:8000/api/login", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({
              email,
              password
            }),
          })
          .then((response) => response.json())
          .then((data) => {
            if (data.token) {
              document.cookie = 'access_token=' + data.token + '; max-age=3600;';
              window.location.replace('http://127.0.0.1:8000/');
            } else {
              responseDiv.innerHTML = "Login failed. " + data.message;
            }
          })
          .catch((error) => {
            console.error("Error:", error);
          });
      });
    });
  </script>

  <script>
    function getCookie(name) {
      const cookies = document.cookie.split(';');
      for (let i = 0; i < cookies.length; i++) {
        const cookie = cookies[i].trim();
        if (cookie.startsWith(name + '=')) {
          return cookie.substring(name.length + 1, cookie.length);
        }
      }
      return null;
    }

    const token = getCookie("access_token");

    if (token != null) {
      window.location.replace('http://127.0.0.1:8000/');
    }
    
  </script>
</body>

</html>
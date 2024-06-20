<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/x-icon" href="/img/logo2.jpg">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <!-- font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
  <!-- font awesome -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>{{ $title }}</title>
  <style>
    body {
      background-color: #141414;
      font-family: 'Poppins', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .card {
      width: 450px;
      background-color: #0F0F0F;
      border-radius: 15px;
      box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
      transform: translateY(-10px);
      box-shadow: rgba(0, 0, 0, 0.15) 0px 10px 20px;
    }

    .card-header, .card-footer {
      background-color: #0F0F0F;
      border: none;
    }

    .card-header h2 {
      font-size: 24px;
      margin: 0;
      color: #ffffff;
    }

    .card-body {
      padding: 2rem;
      color: #ffffff;
    }

    .form-control {
      border-radius: 5px;
      border: 1px solid #ddd;
      padding: 0.75rem;
      background-color: #1f1f1f;
      color: #ffffff;
    }

    .form-control:focus {
      border-color: #E50000;
      box-shadow: 0 0 0 0.2rem rgba(229, 0, 0, 0.25);
    }

    .btn-primary {
      background-color: #E50000;
      border: none;
      padding: 0.75rem;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .btn-primary:hover {
      background-color: #b00000;
    }

    .alert {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      z-index: 100 !important;
    }

    .text-white {
      color: #ffffff !important;
    }

    .text-white a {
      color: #E50000;
      text-decoration: none;
    }

    .text-white a:hover {
      text-decoration: underline;
    }

    .card-footer {
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show w-50 top-0" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> 
      @endif

      @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show w-50 top-0" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> 
      @endif

      <div class="card my-auto">
        <div class="card-header text-center">
          <h2>Halaman Login</h2>
          <hr>
        </div>
        <div class="card-body">
          <form action="/login" method="post">
            @csrf
            <div class="form-group mb-3">
              <label for="email">Email: </label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" autofocus required value="{{ old('email') }}" placeholder="name@example.com">
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="password">Password: </label>
              <input type="password" class="form-control" name="password" id="password" required placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary mb-3 w-100" name="submit">Login</button>
            <hr>
          </form>
        </div>
        <p class="text-center text-white" style="font-size: 14px;">Belum memiliki akun? <a href="/register">Register Sekarang!</a></p>
        <div class="card-footer text-center text-white">
          <small>&copy; 2024 KlikTiket</small>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function(){
      $(document).on('click', '.btn-close', function(){
        $('.alert').remove();
      });
    });
  </script>
</body>
</html>
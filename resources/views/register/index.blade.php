<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <link rel="icon" type="image/x-icon" href="/img/logomain.jpg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <!-- font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
  <!-- font awesome -->
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
  <div class="container vh-100">
    <div class="row justify-content-center h-100">
      <div class="card my-auto">
        <div class="card-header text-center">
          <h2>Halaman Register</h2>
          <hr class="text-white">
        </div>
        <div class="card-body">
          <form action="/register" method="post">
            @csrf
            <div class="form-group mb-3">
              <label for="name">Name: </label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required value="{{ old('name') }}" placeholder="Name">
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="username">Username: </label>
              <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" autofocus required value="{{ old('username') }}" placeholder="Username">
              @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="email">Email: </label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" required value="{{ old('email') }}" placeholder="Email">
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="password">Password: </label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required placeholder="Password">
              @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-3" name="register">Register</button>
          </form>
        </div>
        <p class="text-center text-white" style="font-size: 14px;">Sudah punya akun? <a href="/login">Login Sekarang!</a></p>
        <div class="card-footer text-center text-white">
          <small>&copy; 2024 KlikTiket</small>
        </div>
      </div>
    </div>
  </div> 
  <script>
    $(document).ready(function(){
      $(document).on('click', '.btn-close', function(){
        $('.alert').remove()
      });
    });
  </script>
</body>
</html>
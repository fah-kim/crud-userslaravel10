<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">
  </head>
  <body>
    <div class="container">
        <h1 class="text-center">Register</h1>
        <form method="POST" action="/register/create">
            @csrf
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" class="form-control" name="name" value="{{ Session::get('name') }}">
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="email" value="{{ Session::get('email') }}">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          @if (Auth::check())
          <div class="mt-3">
              <a href="/">kembali ke tabel</a>
          </div>

          @endif
          <div class="mt-3">
              <a href="/login">Login</a>
          </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
</body>

<script>
    @if (Session::has('success'))
    toastr.success('{{ Session::get('success') }}')
    @elseif (Session::has('error'))
    toastr.error('{{ Session::get('error') }}');
    @endif

    </script>
</html>

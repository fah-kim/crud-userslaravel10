<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data santri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center">Edit Data Santri</h1>
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="/updatedata/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="mb-3">
                              <label class="form-label">Nama Lengkap</label>
                              <input type="text" class="form-control" name="nama" value="{{ $data->nama }}">
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Usia</label>
                              <input type="number" class="form-control" name="usia" value="{{ $data->usia }}">
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Asal</label>
                              <input type="text" class="form-control" name="asal" value="{{ $data->asal }}">
                            </div>
                            <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <a href="/">Kembali ke Tabel</a>
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tabel santri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">
  </head>
  <body>



   <h1 class="text-center mt-4">Tabel Santri</h1>
    <div class="container">
        <a href="/tambahdata" class="btn btn-success">Tambah +</a>
        <div class="row g-3 align-items-center">
            <div class="col-auto">
            <form action="/" method="GET">
            <input type="search" class="form-control" id="cari" placeholder="Cari disini" name="search">
            </form>
        </div>
        <div class="col-auto">
            <a href="/exportpdf" class="btn btn-success mb-4 mt-4">Export PDF</a>
        </div>
        <div class="col-auto">
            <a href="/exportexcel" class="btn btn-success mb-4 mt-4">Export excel</a>
        </div>
        <div class="col-auto">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Import data
             </button>
        </div>
        <div class="col-auto">
            <a href="/register" class="btn btn-info mb-4 mt-4">Register user</a>
        </div>
        <div class="col-auto">
            <a href="/login" class="btn btn-success mb-4 mt-4">Login</a>
        </div>
        <div class="col-auto">
            <a href="/logout" class="btn btn-danger mb-4 mt-4">Logout</a>
        </div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/importexcel" method="POST" enctype="multipart/form-data">
          @csrf
      <div class="modal-body">
        <div class="form-group">
            <input type="file" name="file" required>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div>
  </div>
</div>




    </div>

        <div class="row mb-4">
            <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Foto</th>
                        <th>Usia</th>
                        <th>Asal</th>
                        <th>Dibuat</th>
                        <th></th>

                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $index => $row)
                        <tr>
                            <td>{{ $index + $data->firstItem() }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>
                                <img src="{{ asset('fotosantri/'.$row->foto) }}" alt="" style="width: 40px">
                            </td>
                            <td>{{ $row->usia }}</td>
                            <td>{{ $row->asal }}</td>
                            <td>{{ $row->created_at->diffForHumans()}}</td>
                            <td><a href="#" class="btn btn-danger delete" data-id = "{{ $row->id }}" data-nama="{{ $row->nama }}">Hapus</a>
                                <a href="/tampilkandata/{{ $row->id }}" class="btn btn-warning">Edit</a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
            </table>
            {{ $data->links('pagination::bootstrap-5') }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
</body>
<script>
            $('.delete').click(function (){
                var id = $(this).attr('data-id');
                var nama = $(this).attr('data-nama');

                swal({
        title: "Yakin ?",
        text: "Kamu akan menghapus data atas nama "+nama+" ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location = "/delete/"+id+""
            swal("Data berhasil dihapus !", {
            icon: "success",
            });
        } else {
            swal("Data anda aman");
        }
        });
    })
</script>

<script>
    @if (Session::has('success'))
    toastr.success('{{ Session::get('success') }}')
    @elseif (Session::has('error'))
    toastr.error('{{ Session::get('error') }}');

    @endif
</script>
</html>

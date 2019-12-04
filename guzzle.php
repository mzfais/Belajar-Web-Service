<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();
$response = $client->request(
    'GET',
    'http://localhost/rest-server/index.php/mahasiswa/mhsprodi',
    ['query' => ['token' => '12345', 'prodi' => '010801']]
);
$result =  $response->getBody()->getContents();
$mhs = json_decode($result, true);
$status = $mhs['status'];
$mhs = $mhs['data'];
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Profil Mahasiswa</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Web Service Profile</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Tambah Mahasiswa</a>
                    <a class="nav-item nav-link" href="#">Pricing</a>
                    <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-1">
            <div class="col">
                <h1>Profil Mahasiswa</h1>
            </div>
        </div>

        <div class="row mt-1">
            <?php
            if ($status == true) {
                foreach ($mhs as $row) : ?>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="http://localhost/rest-server/<?php echo $row['foto']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"> <?php echo $row['nama_mhs']; ?></h5>
                                <p class="card-text">Mahasiwa dengan NIM <?php echo $row['nim']; ?> ini berasal dari <?php echo $row['alamat_mhs']; ?>.</p>
                                <a href="#" class="btn btn-primary">Lihat Profil</a>
                            </div>
                        </div>
                    </div>
            <?php endforeach;
            } ?>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form1" action="add_mhs.php" method="post">
                        <div class="form-body">
                            <div class="form-group">
                                <label for="nim" class="label-control">NIM</label>
                                <input type="text" name="nim" id="nim" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nama" class="label-control">Nama Mahasiswa</label>
                                <input type="text" name="nama" id="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="label-control">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="prodi" class="label-control">Program Studi</label>
                                <select name="prodi" id="prodi" class="form-control">
                                    <option value="010101" selected>Teknik Mesin S1</option>
                                    <option value="010102">Teknik Komputer S1</option>
                                    <option value="010801">Teknik Informatika S1</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="btnsave" class="btn btn-primary">Simpan data</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('#btnsave').click(function(e) {
            e.preventDefault();
            $.post('http://abycom/rest-api/add_mhs',
                $('#form1').serialize(),
                function(data, status, xhr) {
                    // do something here with response;
                    if (data.status) {
                        $('#form1')[0].reset();
                        $('#exampleModal').modal('hide');
                        swal("Good job!", "data telah ditambahkan", "success");
                    } else {
                        swal("Bad job!", "Terjadi kesalahan saat menyimpan data", "danger");
                    }
                });

        });
    </script>
</body>

</html>
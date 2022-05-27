<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <title>Data Mahasiswa</title>
  </head>
  <body>
    
    <div class="container" style="margin-top: 80px;">
      
      <div class="row">
        <div class="col-md-10 offset-md-2">

          <div class="card">
            <div class="card-header">
              DATA MAHASISWA
            </div>
            <div class="card-body">

              <a href="<?php echo base_url()?>/mahasiswa/tambah_mahasiswa/" class="btn btn-primary mb-3">+ Tambah</a>

            <table class="table table-striped" id="myTable">

              <thead>
                <tr>
                  <th>No</th>
                  <th scope="col">NIM</th>
                  <th scope="col">NAMA</th>
                  <th scope="col">foto ktp</th>
                  <th scope="col">foto Diri</th>
                  <th scope="col">AKSI</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                  $no = 1;
                  foreach($tb_mahasiswa as $mhs) :
                  ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $mhs['nim'] ?></td>
                    <td><?php echo $mhs['nama_mahasiswa'] ?></td>
                    <td><img src="<?php echo base_url('upload/foto/' . $mhs['foto_ktp']) ?>" width="64"></td>
                    <td><img src="<?php echo base_url('upload/foto/' . $mhs['foto_diri']) ?>" width="64"></td>
                    <td><a href="<?php echo site_url('mahasiswa/edit_mahasiswa/') . $mhs['nim'] ?>" class="btn btn-primary btn-sm rounded-pill m-1"><i class="fas fa-edit">Edit</i></a>
                        <a href="<?php echo site_url('mahasiswa/hapus_mahasiswa/') . $mhs['nim'] ?>" class="btn btn-danger btn-sm rounded-pill m-1" onclick="return confirm('yakin?');"><i class="fas fa-trash">Hapus</i></a></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>  
             

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
  </body>
</html>



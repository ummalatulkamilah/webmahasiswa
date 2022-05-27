<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Edit mahasiswa</title>
  </head>
  <body>
    
    <div class="container" style="margin-top: 80px;">
      
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT MAHASISWA
            </div>
            <div class="card-body">
              
            <?php echo form_open_multipart('mahasiswa/update_mahasiswa/');?>

            <div class="form-group">
    <label for="nim">NIM</label>
								<input class="form-control " type="text" id = "nim" name="nim" placeholder="NIM" value="<?php echo $tb_mahasiswa['nim'] ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nim') ?>
								</div>
    </div>
    <div class="form-group">
    <label for="nama_mahasiswa">Nama Mahasiswa</label>
								<input class="form-control <?php echo form_error('nama_mahasiswa') ? 'is-invalid' : '' ?>" type="text" name="nama_mahasiswa" placeholder="Nama Mahasiswa" value="<?php echo $tb_mahasiswa['nama_mahasiswa'] ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_mahasiswa') ?>
								</div>
    </div>
    <div class="form-group">
    <label for="foto_ktp">Foto KTP</label><br>
    <?php if($tb_mahasiswa['foto_ktp'] == ''){ ?>
    <img src="<?php echo base_url('upload/foto/ktp.jpg') ?>" alt=""> <br>
    <?php }else{ ?>
      <img src="<?php echo base_url('upload/foto/'. $tb_mahasiswa['foto_ktp']) ?>" alt=""> <br>
      <?php }?>
		<input type="file" class="form-control " name="foto_ktp" placeholder="Foto KTP" value="<?php echo $tb_mahasiswa['foto_ktp'] ?>" />
    </div>
    <div class="form-group">
    <label for="foto_diri">Foto Diri</label><br>
    <?php if($tb_mahasiswa['foto_diri'] == ''){ ?>
    <img src="<?php echo base_url('upload/foto/default.jpg') ?>" alt=""> <br>
    <?php }else{ ?>
      <img src="<?php echo base_url('upload/foto/'. $tb_mahasiswa['foto_diri']) ?>" alt=""> <br>
      <?php }?>
		<input type="file" class="form-control " name="foto_diri" placeholder="Foto diri" value="<?php echo $tb_mahasiswa['foto_diri'] ?>" />
    </div>
      </div>
    </div>
              
              <button type="submit" class="btn btn-primary">UPDATE</button>
              <?php echo form_close();?>

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
  </body>
</html>

	



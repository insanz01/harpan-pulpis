<?php
  include "config/config.php";
  include "controller/publik-laporan-publik.controller.php";
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item text-white"><a href="#" class="text-white">Home</a></li>
          <li class="breadcrumb-item text-white">Publik Laporan</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <div class="row pt-4">
      <div class="col-12">
        <h1 class="text-center text-white">Laporan Publik</h1>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered custom-table">
              <thead>
                <th>#</th>
                <th>Lokasi Pasar</th>
                <th>Tanggal Kegiatan</th>
                <th>Jenis Kegiatan</th>
                <th>Foto Kegiatan</th>
              </thead>
              <tbody>
                <?php if(mysqli_num_rows($result) > 0): ?>
                  <?php $number = 1 ?>
                  <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                      <td><?= $number++ ?></td>
                      <td><?= $row['lokasi'] ?></td>
                      <td><?= $row['tanggal_kegiatan'] ?></td>
                      <td><?= $row['jenis_kegiatan'] ?></td>
                      <td>
                        <img src="<?= $base_url ?>uploads/<?= $row['foto_kegiatan'] ?>" style="width: 100px" alt="">
                      </td>
                    </tr>
                  <?php endwhile; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Main row -->

  </div><!-- /.container-fluid -->
</section>
<?php
  include "config/config.php";
  include "controller/sembako.controller.php";
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-white">Data Sembako</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#" class="text-white">Sembako</a></li>
          <li class="breadcrumb-item  text-white">Sembako</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container">

    <div class="row py-4">
      <div class="col-4">
      </div>
      <div class="col-4"> 
      </div>
      <div class="col-4">
        <div class="form-group">
          
        </div>
      </div>
    </div>

    <!-- Small boxes (Stat box) -->
    <div class="row">

      <div class="col-12 mx-auto">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered custom-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Pasar</th>
                  <th>Petugas</th>
                  <th>Tanggal</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php $number = 1 ?>
                <?php foreach($data as $datum): ?>
                  <tr>
                    <td><?= $number++ ?></td>
                    <td><?= $datum['nama_pasar'] ?></td>
                    <td><?= $datum['petugas'] ?></td>
                    <td><?= $datum['created_at'] ?></td>
                    <td>
                      <a href="?page=sembako-detail-publik&id_sembako=<?= $datum['id'] ?>&id=<?= $datum['id_pasar'] ?>" class="btn btn-info float-right mx-2" role="button">
                        <i class="fas fa-fw fa-book"></i>
                        Detail
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
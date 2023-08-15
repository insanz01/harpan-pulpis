<?php
  include "config/config.php";
  include "controller/sembako-detail.controller.php";
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
            <h3><?= $data['nama_pasar'] ?></h3>
            <h5><?= $data['petugas'] ?></h5>
            <table class="table table-bordered custom-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Bahan Pokok</th>
                  <th>Harga Pedagang 1</th>
                  <th>Harga Pedagang 2</th>
                  <th>Harga Pedagang 3</th>
                  <th>Harga Pedagang 4</th>
                </tr>
              </thead>
              <tbody>
                <?php $number = 1 ?>
                <?php if(isset($data['harga'])): ?>
                  <?php foreach($data['harga'] as $datum): ?>
                    <tr>
                      <td><?= $number++ ?></td>
                      <td><?= $datum['nama_bahan'] ?></td>
                      <td><?= $datum['harga_pedagang_1'] ?></td>
                      <td><?= $datum['harga_pedagang_2'] ?></td>
                      <td><?= $datum['harga_pedagang_3'] ?></td>
                      <td><?= $datum['harga_pedagang_4'] ?></td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
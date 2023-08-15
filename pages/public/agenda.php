<?php
  include "controller/agenda-pasar.controller.php";
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
          <li class="breadcrumb-item text-white">Agenda Pasar Murah</li>
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
        <h1 class="text-center text-white">Agenda Pasar Murah</h1>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered custom-table">
              <thead>
                <th>#</th>
                <th>Lokasi Pasar Murah</th>
                <th>Tanggal Kegiatan</th>
                <th>Jam Kegiatan</th>
                <th>Item Komoditas</th>
              </thead>
              <tbody>
                <?php if(mysqli_num_rows($result) > 0): ?>
                  <?php $number = 1 ?>
                  <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <?php
                      $items = [];
                      $arrAssoc = json_decode($row['item_komoditas'], true);

                      if($arrAssoc) {
                        foreach($arrAssoc as $arr) {
                          $temp_item = "<span class='badge badge-sm badge-primary badge-pill ml-1'>$arr[name]</span>";
  
                          array_push($items, $temp_item);
                        }
                      }
                    ?>
                    <tr>
                      <td><?= $number++ ?></td>
                      <td><?= $row['lokasi'] ?></td>
                      <td><?= $row['tanggal'] ?></td>
                      <td><?= $row['jam_kegiatan'] ?></td>
                      <td>
                        <?php foreach($items as $item): ?>
                          <?= $item; ?>
                        <?php endforeach; ?>
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
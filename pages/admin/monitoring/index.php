<?php
  include "config/config.php";
  include "controller/admin-monitoring.controller.php";

  $role_id = 0;
  if(isset($_SESSION["SESS_HARPAN_ROLE_ID"])) {
    $role_id = $_SESSION["SESS_HARPAN_ROLE_ID"];
  }
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Permintaan Monitoring</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Data</a></li>
          <li class="breadcrumb-item active">Permintaan Monitoring</li>
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
        <!-- <div class="form-group">
          <label for="laporan-periode">Laporan Periode</label>
          <input type="date" class="form-control">
        </div> -->
      </div>
      <div class="col-4"></div>
      <div class="col-4">
        <!-- <div class="form-group">
          <label for="laporan-periode">Laporan Periode</label>
          <input type="date" class="form-control">
        </div>     -->
        <a href="#" class="btn btn-info float-right mx-2" role="button" data-toggle="modal" data-target="#laporanModal" data-id="permintaan-monitoring-pasar" onclick="printLaporan(this)">
          <i class="fas fa-fw fa-print"></i>
          Cetak
        </a>
        <?php if($role_id == 1): ?>
          <a href="?page=monitoring-pasar&action=tambah" class="btn btn-primary float-right" role="button">TAMBAH</a>
        <?php endif; ?>
      </div>
    </div>
    
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-12 mx-auto">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered custom-table">
              <thead>
                <th>#</th>
                <th>Petugas</th>
                <th>Pasar</th>
                <th>Tanggal</th>
                <th>Status</th>
                <?php if($role_id == 1): ?>
                  <th>Opsi</th>
                <?php endif; ?>
              </thead>
              <tbody>
                <?php if(mysqli_num_rows($result) > 0): ?>
                  <?php $number = 1 ?>
                  <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                      <td><?= $number++ ?></td>
                      <td><?= $row['petugas'] ?></td>
                      <td><?= $row['pasar'] ?></td>
                      <td><?= date('d M Y', strtotime($row['tanggal'])) ?></td>
                      <td>
                        <?php if($row['approved_at']): ?>
                          Terverifikasi
                        <?php else: ?>
                          Belum Diverifikasi
                        <?php endif; ?>  
                      </td>
                      <?php if($role_id == 1): ?>
                        <td>
                          <?php if(!$row['approved_at']): ?>
                            <a href="#!" onclick="verifikasiData(<?= $row['id'] ?>)" class="btn btn-primary" role="button">VERIFIKASI</a>
                          <?php endif; ?>
                        </td>
                      <?php endif; ?>
                    </tr>
                  <?php endwhile; ?>
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

<script>
  const doVerification = async (id) => {
    return await axios.post(`<?= $base_url ?>api/approve-monitoring.api.php`, {
      id
    },{
      headers: {
        "Content-Type": "multipart/form-data"
      }
    }).then(res => res.data);
  }

  const verifikasiData = async (id) => {
    const result = await doVerification(id);

    if(result.status) {
      console.log(result.data);
      location.reload();
    }
  }
</script>
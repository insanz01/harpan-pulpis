<?php
  include "config/config.php";
  include "controller/agenda-pasar.controller.php";

  $role_id = 0;
  if(isset($_SESSION["SESS_HARPAN_ROLE_ID"])) {
    $role_id = $_SESSION["SESS_HARPAN_ROLE_ID"];
  }
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Agenda Pasar Murah</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Agenda</a></li>
          <li class="breadcrumb-item active">Pasar Murah</li>
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
      <div class="col-4">
        <!-- <div class="form-group">
          <label for="laporan-periode">Laporan Periode</label>
          <input type="date" class="form-control">
        </div>     -->
      </div>
      <div class="col-4">
        <div class="form-group">
          <a href="?page=admin-agenda&action=tambah" class="btn btn-primary float-right" role="button">
            <i class="fas fa-fw fa-plus"></i>
            Tambah
          </a>

          <a href="#" class="btn btn-info float-right mx-2" role="button" data-toggle="modal" data-target="#laporanModal" data-id="agenda-pasar-murah" onclick="printLaporan(this)">
            <i class="fas fa-fw fa-print"></i>
            Cetak
          </a>
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
                <th>#</th>
                <th>Lokasi Pasar Murah</th>
                <th>Tanggal Kegiatan</th>
                <th>Jam Kegiatan</th>
                <th>Item Komoditas</th>
                <th>Aksi</th>
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
                      <td>
                        <a href="#" class="btn btn-danger float-right" role="button" data-toggle="modal" data-target="#hapusModal" onclick="selectDeleteData(<?= $row['id'] ?>)">
                          <i class="fas fa-fw fa-trash"></i>
                          Hapus
                        </a>
                        <a href="index.php?page=admin-agenda&action=edit&id=<?= $row['id'] ?>" class="btn btn-primary float-right mx-2" role="button">
                          <i class="fas fa-fw fa-edit"></i>
                          Ubah
                        </a>
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
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

<!-- Modal Hapus -->
<div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusModalLabel">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda ingin menghapus data ini ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" onclick="deleteData()" class="btn btn-danger">Hapus</button>
      </div>
    </div>
  </div>
</div>

<script>
  let DELETE_ID = 0;

  const selectDeleteData = (delete_id) => {
    DELETE_ID = delete_id;
  }

  const doDelete = async (data) => {
    return await axios.post(`<?= $base_url ?>/api/delete-agenda.api.php`, data, {
      headers: {
        "Content-Type": "multipart/form-data"
      }
    }).then(res => res.data);
  }

  const deleteData = async () => {
    
    const data = {
      id: DELETE_ID
    }

    const result = await doDelete(data);

    console.log("delete response :", result);

    if(result) {
      location.reload();
    }
  }
</script>
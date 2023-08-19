<?php
  include "config/config.php";
  include "controller/sembako-detail.controller.php";

  $role_id = 0;
  if(isset($_SESSION["SESS_HARPAN_ROLE_ID"])) {
    $role_id = $_SESSION["SESS_HARPAN_ROLE_ID"];
  }
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Sembako</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Sembako</a></li>
          <li class="breadcrumb-item active">Sembako</li>
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
          <a href="#" class="btn btn-info float-right mx-2" role="button" data-toggle="modal" data-target="#laporanModal" data-id="monitoring-sembako-detail" data-additional="<?= $data['id'] ?>" onclick="printLaporan(this)">
            <i class="fas fa-fw fa-print"></i>
            Cetak
          </a>
          <?php if($role_id == 2): ?>
            <a href="?page=sembako-detail&action=tambah&id_pasar=<?= $id_pasar ?>&id_sembako=<?= $data['id'] ?>" class="btn btn-success float-right mx-2" role="button">
              <i class="fas fa-fw fa-plus"></i>
              Tambah
            </a>
          <?php endif; ?>
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
                  <?php if($role_id == 2): ?>
                    <th class="text-right">Opsi</th>
                  <?php endif; ?>
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
                      <?php if($role_id == 2): ?>
                        <td>
                          <a href="#" class="btn btn-danger float-right" role="button" data-toggle="modal" data-target="#hapusModal" onclick="selectDeleteData(<?= $datum['id'] ?>)">
                            <i class="fas fa-fw fa-trash"></i>
                            Hapus
                          </a>
                          <a href="?page=sembako-detail&action=edit&id_sembako=<?= $id_sembako ?>&id=<?= $datum['id'] ?>&id_pasar=<?= $id_pasar ?>" class="btn btn-primary float-right mx-2" role="button">
                            <i class="fas fa-fw fa-edit"></i>
                            Ubah
                          </a>
                        </td>
                      <?php endif; ?>
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

<!-- Modal -->
<div class="modal fade" id="cetakModal" tabindex="-1" aria-labelledby="cetakModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cetakModalLabel">Cetak Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Laporan Periode (Tanggal Awal)</label>
          <input type="date" class="form-control" name="cetak-tanggal-awal">
        </div>
        <div class="form-group">
          <label for="">Laporan Periode (Tanggal Akhir)</label>
          <input type="date" class="form-control" name="cetak-tanggal-akhir">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" onclick="printReport()" class="btn btn-primary">Cetak</button>
      </div>
    </div>
  </div>
</div>

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

<!-- Modal Verifikasi -->
<div class="modal fade" id="verifikasiModal" tabindex="-1" aria-labelledby="verifikasiModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="verifikasiModalLabel">Verifikasi Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda ingin verifikasi data ini ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" onclick="verifikasiData()" class="btn btn-primary">Verifikasi</button>
      </div>
    </div>
  </div>
</div>

<script>
  let DELETE_ID = 0;
  let VERIFIKASI_ID = 0;

  const printReport = async () => {
    const periodeAwal = document.getElementById("cetak-tanggal-awal").value;
    const periodeAkhir = document.getElementById("cetak-tanggal-akhir").value;

    console.log(periodeAwal);
    console.log(periodeAkhir);
  }

  const selectDeleteData = (delete_id) => {
    DELETE_ID = delete_id;
  }

  const doDelete = async (data) => {
    return await axios.post(`<?= $base_url ?>api/delete-detail-sembako.api.php`, data, {
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

  const selectVerifikasiData = (verifikasi_id) => {
    VERIFIKASI_ID = verifikasi_id;
  }

  const doVerifikasi = async (data) => {
    return await axios.post(`<?= $base_url ?>/api/approve-produsen.api.php`, data, {
      headers: {
        "Content-Type": "multipart/form-data"
      }
    }).then(res => res.data);
  }

  const verifikasiData = async () => {
    
    const data = {
      id: VERIFIKASI_ID
    }

    const result = await doVerifikasi(data);

    console.log("verifikasi response :", result);

    if(result) {
      location.reload();
    }
  }

</script>
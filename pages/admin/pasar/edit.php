<?php
  include "config/config.php";
  include "database/db.php";

  $id_edit = 0;

  $data = [];

  if(isset($_GET["id"])) {
    $id_edit = $_GET["id"];

    $query = "SELECT * FROM pasar WHERE id = $id_edit";

    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);

      $data = $row;
    }
  }
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Pasar</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Pasar</a></li>
          <li class="breadcrumb-item active">Edit Pasar</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <input type="hidden" id="id_edit" value="<?= $id_edit; ?>">

            <div class="form-group">
              <label for="">Nama Pasar</label>
              <input type="text" class="form-control" placeholder="misal: Sudimampir" id="nama" value="<?= $data['nama'] ?>">
            </div>
            <div class="form-group">
              <label for="">Kecamatan</label>
              <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="<?= $data['kecamatan'] ?>">
            </div>
            <div class="form-group">
              <label for="">Kelurahan</label>
              <input type="text" class="form-control" name="kelurahan" id="kelurahan" value="<?= $data['kelurahan'] ?>">
            </div>
            <div class="form-group">
              <label for="">Keterangan</label>
              <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"><?= $data['keterangan'] ?></textarea>
            </div>
            <div class="form-group">
              <button class="btn btn-success btn-block" type="button" role="button" onclick="submitData()">Simpan Data Pasar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

<script>
  const saveData = async (data) => {
    return await axios.post(`<?= $base_url ?>api/edit-pasar.api.php`, {
      id: data.id,
      nama: data.nama,
      kecamatan: data.kecamatan,
      kelurahan: data.kelurahan,
      keterangan: data.keterangan,
    },{
      headers: {
        "Content-Type": "multipart/form-data"
      }
    }).then(res => res.data);
  }

  const submitData = async () => {
    const id = document.getElementById("id_edit").value;
    const nama = document.getElementById("nama").value;
    const kecamatan = document.getElementById("kecamatan").value;
    const kelurahan = document.getElementById("kelurahan").value;
    const keterangan = document.getElementById("keterangan").value;

    const data = {
      id,
      nama,
      kecamatan,
      kelurahan,
      keterangan,
    }

    console.log("data", data);

    const result = await saveData(data);

    if(result.status) {
      window.location.href = "<?= $base_url ?>index.php?page=pasar"
    }
  }
</script>
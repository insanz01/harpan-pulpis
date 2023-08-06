<?php
  include "config/config.php";
  include "database/db.php";

  $id_harga_sembako = 0;
  if(isset($_GET["id"])) {
    $id_harga_sembako = $_GET["id"];
  }

  $id_sembako = 0;
  if(isset($_GET["id_sembako"])) {
    $id_sembako = $_GET["id_sembako"];
  }

  $query = "SELECT * FROM komoditas WHERE deleted_at is NULL";

  $result = mysqli_query($connection, $query);

  $komoditas = [];
  if($result) {
    if(mysqli_num_rows($result) > 0) {
      while($r = mysqli_fetch_assoc($result)) {
        $komoditas[] = $r;
      }
    }
  }

  $queryHargaSembako = "SELECT * FROM harga_komoditas WHERE id = $id";

  $resultHargaSembako = mysqli_query($connection, $query);

  $hargaSembako = [];
  if($resultHargaSembako) {
    if(mysqli_num_rows($resultHargaSembako) > 0) {
      $r = mysqli_fetch_assoc($resultHargaSembako);

      $hargaSembako = $r;
    }
  }
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Detail Sembako</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Detail Sembako</a></li>
          <li class="breadcrumb-item active">Tambah Detail Sembako</li>
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
            <input type="hidden" name="id_edit" value="<?= $id_harga_sembako ?>">
            <input type="hidden" name="id_sembako" value="<?= $id_sembako ?>">
            <div class="form-group">
              <label for="">Komoditas</label>
              <select name="id_komoditas" id="id_komoditas" class="form-control">
                <?php foreach($komoditas as $k): ?>
                  <option value="<?= $k['id'] ?>" <?= ($k['id'] == $hargaSembako) ? 'selected': '' ?>>
                    <?= $k['nama'] ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Satuan</label>
              <input type="text" class="form-control" name="satuan" id="satuan" value="<?= $hargaSembako['satuan'] ?>">
            </div>
            <div class="form-group">
              <label for="">Harga Pedagang 1</label>
              <input type="number" class="form-control" name="harga_pedagang_1" id="harga_pedagang_1" value="<?= $hargaSembako['harga_pedagang_1'] ?>">
            </div>
            <div class="form-group">
              <label for="">Harga Pedagang 2</label>
              <input type="number" class="form-control" name="harga_pedagang_2" id="harga_pedagang_2" value="<?= $hargaSembako['harga_pedagang_2'] ?>">
            </div>
            <div class="form-group">
              <label for="">Harga Pedagang 3</label>
              <input type="number" class="form-control" name="harga_pedagang_3" id="harga_pedagang_3" value="<?= $hargaSembako['harga_pedagang_3'] ?>">
            </div>
            <div class="form-group">
              <label for="">Harga Pedagang 4</label>
              <input type="number" class="form-control" name="harga_pedagang_4" id="harga_pedagang_4" value="<?= $hargaSembako['harga_pedagang_4'] ?>">
            </div>
            <div class="form-group">
              <button class="btn btn-success btn-block" type="button" role="button" onclick="submitData()">Simpan Data Sembako</button>
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
    return await axios.post(`<?= $base_url ?>api/edit-detail-sembako.api.php`, {
      id: data.id,
      id_sembako: data.id_sembako,
      id_komoditas: data.id_komoditas,
      satuan: data.satuan,
      harga_pedagang_1: data.harga_pedagang_1,
      harga_pedagang_2: data.harga_pedagang_2,
      harga_pedagang_3: data.harga_pedagang_3,
      harga_pedagang_4: data.harga_pedagang_4,
    },{
      headers: {
        "Content-Type": "multipart/form-data"
      }
    }).then(res => res.data);
  }

  const submitData = async () => {
    const id = document.getElementById("id_edit").value;
    const id_sembako = document.getElementById("id_sembako").value;
    const id_komoditas = document.getElementById("id_komoditas").value;
    const satuan = document.getElementById("satuan").value;
    const harga_pedagang_1 = document.getElementById("harga_pedagang_1").value;
    const harga_pedagang_2 = document.getElementById("harga_pedagang_2").value;
    const harga_pedagang_3 = document.getElementById("harga_pedagang_3").value;
    const harga_pedagang_4 = document.getElementById("harga_pedagang_4").value;

    const data = {
      id_sembako,
      id_komoditas,
      satuan,
      id_komoditas,
      harga_pedagang_1,
      harga_pedagang_2,
      harga_pedagang_3,
      harga_pedagang_4,
    }

    console.log("data", data);

    const result = await saveData(data);

    if(result.status) {
      window.location.href = "<?= $base_url ?>index.php?page=sembako-detail&id_sembako=<?= $id_sembako ?>"
    }
  }
</script>
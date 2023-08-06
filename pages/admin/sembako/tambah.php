<?php
  include "config/config.php";
  include "database/db.php";

  $query = "SELECT * FROM pasar WHERE deleted_at is NULL";

  $result = mysqli_query($connection, $query);

  $pasar = [];
  if($result) {
    if(mysqli_num_rows($result) > 0) {
      while($r = mysqli_fetch_assoc($result)) {
        $pasar[] = $r;
      }
    }
  }
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Sembako</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Sembako</a></li>
          <li class="breadcrumb-item active">Tambah Sembako</li>
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
            <div class="form-group">
              <label for="">Pasar</label>
              <select name="id_pasar" id="id_pasar" class="form-control">
                <?php foreach($pasar as $p): ?>
                  <option value="<?= $p['id'] ?>">
                    <?= $p['nama'] ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Petugas</label>
              <input type="text" class="form-control" name="petugas" id="petugas">
              <small>Berikan simbol titik koma (;) untuk memisahkan nama petugas</small>
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
    return await axios.post(`<?= $base_url ?>api/add-sembako.api.php`, {
      id_pasar: data.id_pasar,
      petugas: data.petugas,
    },{
      headers: {
        "Content-Type": "multipart/form-data"
      }
    }).then(res => res.data);
  }

  const submitData = async () => {
    const id_pasar = document.getElementById("id_pasar").value;
    const petugas = document.getElementById("petugas").value;

    const data = {
      id_pasar,
      petugas,
    }

    console.log("data", data);

    const result = await saveData(data);

    if(result.status) {
      window.location.href = "<?= $base_url ?>index.php?page=sembako"
    }
  }
</script>
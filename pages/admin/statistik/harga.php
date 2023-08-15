<?php
  include "config/config.php";
  include "controller/statistik-harga-pedagang.controller.php";
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Harga Sembako</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Harga Sembako</a></li>
          <li class="breadcrumb-item active">Lihat Statistik</li>
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
            <form action="<?= $base_url ?>index.php?page=hasil-statistik-harga" method="post">
              <div class="form-group">
                <label for="">Nama Pasar</label>
                <select name="id_pasar" class="form-control" id="id_pasar" onchange="lihatHarga(this)">
                  <option value="">- PILIH -</option>
                  <?php foreach($pasar as $p): ?>
                    <option value="<?= $p['id'] ?>">
                      <?= $p['nama'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Nama Komoditas</label>
                <select name="id_komoditas" class="form-control" id="id_komoditas" onchange="lihatHarga(this)">
                  <option value="">- PILIH -</option>
                  <?php foreach($komoditas as $p): ?>
                    <option value="<?= $p['id'] ?>">
                      <?= $p['nama'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Harga Pedagang 1</label>
                <input type="text" class="form-control" id="pedagang-1" readonly>
              </div>
              <div class="form-group">
                <label for="">Harga Pedagang 2</label>
                <input type="text" class="form-control" id="pedagang-2" readonly>
              </div>
              <div class="form-group">
                <label for="">Harga Pedagang 3</label>
                <input type="text" class="form-control" id="pedagang-3" readonly>
              </div>
              <div class="form-group">
                <label for="">Harga Pedagang 4</label>
                <input type="text" class="form-control" id="pedagang-4" readonly>
              </div>
              <div class="form-group">
                <!-- <button class="btn btn-success btn-block" type="button" role="button" onclick="submitData()">Data Statistik</button> -->
                <button class="btn btn-success btn-block" type="submit" role="button">Data Statistik</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

<script>
  const saveData = async (data) => {
    return await axios.post(`<?= $base_url ?>api/add-distributor.api.php`, data, {
      headers: {
        "Content-Type": "multipart/form-data"
      }
    }).then(res => res.data);
  }

  const loadKomoditas = async () => {
    return await axios.get(`<?= $base_url ?>api/komoditas.api.php`).then(res => res.data);
  }

  const submitData = async () => {
    const id_pasar = document.getElementById("id_pasar").value;
    const id_komoditas = document.getElementById("id_komoditas").value;

    const data = {
      id_pasar,
      id_komoditas
    }

    console.log(data);

    const result = await saveData(data);

    if(result.status) {
      window.location.href = "<?= $base_url ?>index.php?page=hasil-statistik-harga"
    }
  }

  const renderSelectOption = async (target, data) => {
    const listOpt = document.getElementById(target);

    let temp = `<option value="">- PILIH -</option>`

    data.forEach(res => {
      temp += `<option value="${res.id}">${res.nama}</option>`
    });

    listOpt.innerHTML = temp;
  }

  const getHargaPedagang = async (data) => {
    return await axios.get(`<?= $base_url ?>api/harga-pedagang.api.php?id_pasar=${data.id_pasar}&id_komoditas=${data.id_komoditas}`).then(res => res.data);
  }

  const lihatHarga = async (target) => {
    const pasarValue = document.getElementById('id_pasar').value;
    const komoditasValue = document.getElementById('id_komoditas').value;

    if(pasarValue != "" && komoditasValue != "") {
      const data = {
        id_pasar: pasarValue,
        id_komoditas: komoditasValue,
      };

      const result = await getHargaPedagang(data);

      console.log(result);

      if(result.status) {
        document.getElementById('pedagang-1').value = result.data.harga_pedagang_1;
        document.getElementById('pedagang-2').value = result.data.harga_pedagang_2;
        document.getElementById('pedagang-3').value = result.data.harga_pedagang_3;
        document.getElementById('pedagang-4').value = result.data.harga_pedagang_4;
      } else {
        document.getElementById('pedagang-1').value = 0;
        document.getElementById('pedagang-2').value = 0;
        document.getElementById('pedagang-3').value = 0;
        document.getElementById('pedagang-4').value = 0;
      }
    }
  }

  window.addEventListener('load', async () => {
    const komoditiResult = await loadKomoditas();

    if(komoditiResult.status) {
      // await renderSelectOption('id_komoditas', komoditiResult.data);
    }
  })
</script>
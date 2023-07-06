<?php
  include "config/config.php";
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Kontak</a></li>
          <li class="breadcrumb-item active">Kontak Kami</li>
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
      <div class="col-7 mx-auto">
        <div class="card">
          <div class="card-body">
            <img src="https://ngepop.id/upload/media/entries/2023-05/31/361-entry-0-1685513035.jpg" class="text-center w-100" alt="">
            <p class="py-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae, iste quidem? Maxime eius, doloremque labore deserunt inventore optio esse, tenetur quos ex quo molestias atque omnis quibusdam nesciunt ut porro.</p>

            <button class="btn btn-primary btn-block" role="button"  data-toggle="modal" data-target="#kritikSaranModal">KRITIK DAN SARAN</button>
          </div>
        </div>
      </div>
    </div>

  </div><!-- /.container-fluid -->
</section>

<!-- Modal -->
<div class="modal fade" id="kritikSaranModal" tabindex="-1" aria-labelledby="kritikSaranModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="kritikSaranModalLabel">Kritik dan Saran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Masukan kritik dan saran anda pada kolom ini</label>
          <textarea name="kritik_saran" id="kritik_saran" class="form-control" cols="30" rows="10"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" onclick="kirimKritikSaran()" class="btn btn-primary">Kirim</button>
      </div>
    </div>
  </div>
</div>

<script>
  const loadData = async () => {
    return await axios.get(`<?= $base_url ?>/api/publik-stok.api.php`).then(res => res.data);
  }

  const saveKritikSaran = async (data) => {
    return await axios.post(`<?= $base_url ?>/api/add-kritik-saran.api.php`, {
      kritik_saran: data.kritik_saran
    }, {
      headers: {
        "Content-Type": "multipart/form-data"
      }
    }).then(res => res.data);
  }

  const kirimKritikSaran = async () => {
    const kritikSaran = document.getElementById('kritik_saran').value;

    const data = {
      "kritik_saran": kritikSaran
    }

    const result = await saveKritikSaran(data);

    if(result.status == true) {
      window.location.href = "<?= $base_url ?>index.php?page=kontak-kami"
    }
  }

  const renderTable = (data) => {
    const target = document.getElementById('tabel-stok');

    let temp = ``;

    let role_id = `<?= $role_id ?>`;

    data.forEach((res, index) => {
      temp += `
              <tr>
                <td>${index + 1}</td>
                <td>${res.nama}</td>
                <td>${res.satuan}</td>
                <td>${res.stok}</td>
                <td>${res.created_at}</td>
              </tr>
            `;
    });

    target.innerHTML = temp;
  }

  const showData = async () => {
    const result = await loadData();

    console.log("log stok", result);

    if(result.status) {
      renderTable(result.data);
    }
  }

  window.addEventListener("load", async () => {
    await showData();
  })
</script>
<?php
  include "config/config.php";
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Laporan Publik</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#"></a></li>
          <li class="breadcrumb-item active">Tambah Laporan Publik</li>
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
              <label for="">Nama Lokasi</label>
              <input type="text" class="form-control" placeholder="" id="lokasi">
            </div>
            <div class="form-group">
              <label for="">Tanggal Kegiatan</label>
              <input type="date" class="form-control" name="tanggal_kegiatan" id="tanggal_kegiatan">
            </div>
            <div class="form-group">
              <label for="">Jenis Kegiatan</label>
              <input type="text" class="form-control" name="jenis_kegiatan" id="jenis_kegiatan">
            </div>
            <div class="form-group">
              <label for="">File</label>
              <input type="file" class="form-control" name="foto_kegiatan" id="foto_kegiatan" onchange="uploadFile(this)">
            </div>
            <div class="form-group">
              <button class="btn btn-success btn-block" type="button" role="button" onclick="submitData()">Simpan Data Laporan Publik</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

<script>
  let FILENAME = "";

  const saveData = async (data) => {
    return await axios.post(`<?= $base_url ?>api/add-laporan-publik.api.php`, data,{
      headers: {
        "Content-Type": "multipart/form-data"
      }
    }).then(res => res.data);
  }

  const submitData = async () => {
    const lokasi = document.getElementById("lokasi").value;
    const tanggal_kegiatan = document.getElementById("tanggal_kegiatan").value;
    const jenis_kegiatan = document.getElementById("jenis_kegiatan").value;
    const foto_kegiatan = FILENAME;

    const data = {
      lokasi,
      tanggal_kegiatan,
      jenis_kegiatan,
      foto_kegiatan,
    }

    console.log(data);

    const result = await saveData(data);

    if(result.status) {
      window.location.href = "<?= $base_url ?>index.php?page=laporan-publik"
    }
  }

  function uploadFile(target) {
      const fileInput = document.getElementById('foto_kegiatan');
      const file = target.files[0];

      // console.log(file);
      console.log(target.files[0]);

      if (file) {
          const formData = new FormData();
          formData.append('file', file);

          const xhr = new XMLHttpRequest();
          xhr.open('POST', '<?= $base_url ?>helper/upload.php', true);

          xhr.onreadystatechange = function() {
              if (xhr.readyState === XMLHttpRequest.DONE) {
                  if (xhr.status === 200) {
                      console.log('File uploaded successfully:', xhr.responseText);
                  } else {
                      console.error('Error uploading file:', xhr.status, xhr.statusText);
                  }
              }
          };

          FILENAME = file.name

          xhr.send(formData);
      } else {
          console.error('Please select a file to upload.');
      }
  }
</script>
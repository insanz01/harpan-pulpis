<?php
  // session_start();
  include_once "config/config.php";
?>

<div class="content-header text-white">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Kontak Kami</h1>
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
            <!-- <img src="https://ngepop.id/upload/media/entries/2023-05/31/361-entry-0-1685513035.jpg" class="text-center w-100" alt=""> -->
            <img src="./dist/img/logo_banjarmasin.jpg" class="text-center w-100" alt="">
            <!-- <p class="py-3">Dinas Ketahanan Pangan, Pertanian, dan Perikanan (DKP3) Kota Banjarmasin adalah sebuah lembaga pemerintah yang bertanggung jawab atas pengelolaan sektor pertanian, perikanan, dan ketahanan pangan di Kota Banjarmasin, Indonesia.</p> -->

            <button class="btn btn-primary btn-block" role="button"  data-toggle="modal" data-target="#kritikSaranModal" onclick="generateNewCaptcha()">KRITIK DAN SARAN</button>
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
          <label for="">Nama</label>
          <input type="text" name="nama" id="nama" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Alamat</label>
          <input type="text" name="alamat" id="alamat" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="">No HP</label>
          <input type="text" name="no_hp" id="no_hp" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Masukan kritik dan saran anda pada kolom ini</label>
          <textarea name="kritik_saran" id="kritik_saran" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
          <img src="<?= $base_url ?>helper/generate.php" alt="captcha">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="captcha" id="captcha" maxlength="5" placeholder="kode captcha">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" onclick="kirimKritikSaran()" class="btn btn-primary">Kirim</button>
      </div>
    </div>
  </div>
</div>

<script defer>
  let captchaCode = `<?= $_SESSION["code"] ?>`;

  const getNewSession = async () => {
    return await axios.get(`<?= $base_url ?>helper/get_session.php`).then(res => res.data);
  }

  const generateNewCaptcha = async () => {
    const result = await getNewSession();

    captchaCode = result.data.captcha_code;
    
    console.log("captcha code", captchaCode);
  }

  const loadData = async () => {
    return await axios.get(`<?= $base_url ?>/api/publik-stok.api.php`).then(res => res.data);
  }

  const saveKritikSaran = async (data) => {
    return await axios.post(`<?= $base_url ?>/api/add-kritik-saran.api.php`, data, {
      headers: {
        "Content-Type": "multipart/form-data"
      }
    }).then(res => res.data);
  }

  const kirimKritikSaran = async () => {
    const kritik_saran = document.getElementById('kritik_saran').value;
    const nama = document.getElementById('nama').value;
    const alamat = document.getElementById('alamat').value;
    const no_hp = document.getElementById('no_hp').value;
    const email = document.getElementById('email').value;
    const captcha = document.getElementById('captcha').value;

    const captchaSession = captchaCode;

    if(captchaSession != captcha) {
      console.log(captchaSession);
      alert("captcha yang anda masukan salah!");
      return;
    }

    const data = {
      kritik_saran,
      nama, 
      alamat, 
      no_hp, 
      email, 
      captcha,
    }

    const result = await saveKritikSaran(data);

    if(result.status == true) {
      window.location.href = "<?= $base_url ?>index.php?page=kontak-kami"
    }
  }
</script>
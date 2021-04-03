<?php
require_once('crud.php');
$fakultas = getAllData("fakultas");
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Form Registrasi UKM Volly</title>
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <?php if (isset($_POST['submit'])) : ?>
    <?php if (tambahData($_POST) > 0) : ?>
      <script>
        alert('Terima kasih sudah mengisi form ini, data berhasil ditambahkan');
        document.location.href = '';
      </script>
    <?php else : ?>
      <script>
        alert('Maaf data gagal ditambahkan');
        document.location.href = '';
      </script>
    <?php endif; ?>
  <?php endif; ?>


  <form action="" method="post">
    <div class="data-kamu">
      <h2>Isi Data Anda</h2>


      <label for="nama">Nama</label>
      <input type="text" id="nama" name="nama_mahasiswa" required />

      <label for="nim">NIM</label>
      <input type="text" id="nim" name="nim_mahasiswa" required />

      <label for="courses">Pilih Jurusan</label>
      <select id="courses" name="student_courses">
        <option class="option" disabled="disabled" selected="selected">---Pilih Jurusan---</option>
        <?php foreach ($fakultas as $f) : ?>
          <optgroup label="<?= $f['fakultas']; ?>">
            <?php $jurusan = getWhere('jurusan', 'kode_fakultas', $f['kode_fakultas']); ?>
            <?php foreach ($jurusan as $j) : ?>
              <option value="<?= $j['kode_jurusan']; ?>"><?= $j['jurusan']; ?></option>
            <?php endforeach; ?>
          </optgroup>
        <?php endforeach; ?>
      </select>

      <label for="stambuk">Stambuk</label>
      <input type="text" id="stambuk" name="stambuk_mahasiswa" required />

      <label for="jenis-kelamin">Jenis Kelamin</label>
      <label class="radio">
        <input class="radio-satu" type="radio" id="pria" name="jenis_kelamin" value="pria" />
        <span class="checkmark"></span>
        Pria
      </label>
      <label class="radio">
        <input class="radio-dua" type="radio" id="wanita" name="jenis_kelamin" value="perempuan" />
        <span class="checkmark"></span>
        Wanita
      </label>

      <label for="usia">Usia</label>
      <input type="text" id="usia" name="usia_mahasiswa" required />

      <label for="email">Email</label>
      <input type="email" id="email" name="email_mahasiswa" required />

      <label for="nomor">No Telepon</label>
      <input type="nomor" id="nomor" name="no_mahasiswa" required />     

      <label for="alamat">Alamat</label>
      <input type="alamat" id="alamat" name="alamat_mahasiswa" required />
   
      <label for="alasan">Alasan Masuk UKM Volly</label>
      <textarea id="alasan" name="alasan_mahasiswa" required></textarea>

      
    </div>

    <button type="submit" name="submit">Kirim</button>
  </form>
</body>

</html>

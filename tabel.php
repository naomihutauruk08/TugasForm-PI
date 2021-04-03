<?php
require_once('crud.php');
$data = getAllDataMahasiswa();    //Memanggil function nya untuk mengambil semua data mahasiswanya
$fakultas = getAllData("fakultas");
?>

<html>


<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Data Mahasiswa</title>
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <h1>Data Mahasiswa</h1>
  <div class="tambah-hapus">
    <a href="index.php"><input type="button" value="Tambah" class="tambah" name="tambah" /></a>
  </div>
  <table class="data-table">
    <thead>
      <tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>Jurusan</th>
         <th>Stambuk</th>
        <th>Jenis Kelamin</th> 
        <th>Usia</th>
        <th>Email</th>
        <th>No Telepon</th>
        <th>Alamat</th>
        <th>Alasan Masuk UKM Volly</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody class="content">
      <?php foreach($data as $mahasiswa): ?>    <!-- for each untuk menampilkan semua data mahasiswa yang diambil dari function getAllDataMahasiswa -->
        <tr class="active-row">
          <?php if (isset($_GET['id']) && $mahasiswa['id'] == $_GET['id']) : ?>
            <form action="" method="POST">
              <td><input type="text" id="nama" name="nama_mahasiswa" value="<?= $mahasiswa['nama']; ?>" required></td>
              <td><input type="" id="nim" name="nim_mahasiswa" value="<?= $mahasiswa['nim']; ?>" readonly></td>
              
               <td>
                <select id="courses" name="student_courses">
                  <?php foreach ($fakultas as $f) : ?>
                    <optgroup label="<?= $f['fakultas']; ?>">
                      <?php $jurusan = getWhere('jurusan', 'kode_fakultas', $f['kode_fakultas']); ?>
                      <?php foreach ($jurusan as $j) : ?>
                        <?php if ($j['jurusan'] == $mahasiswa['jurusan']) : ?>
                          <option value="<?= $j['kode_jurusan']; ?>" selected><?= $j['jurusan']; ?></option>
                        <?php else : ?>
                          <option value="<?= $j['kode_jurusan']; ?>"><?= $j['jurusan']; ?></option>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </optgroup>
                  <?php endforeach; ?>
                </select>
              </td>

              <td><input type="text" id="stambuk" name="stambuk_mahasiswa" value="<?= $mahasiswa['stambuk']; ?>" required></td>
             
              <td>
                <?php if ($mahasiswa['jenis_kelamin'] == 'Wanita') : ?>
                  <input type="radio" id="jenis-kelamin" name="jenis_kelamin" value="pria" />Pria <br>
                  <input type="radio" name="jenis_kelamin" value="perempuan" checked />Wanita
                <?php else : ?>
                  <input type="radio" id="jenis-kelamin" name="jenis_kelamin" value="pria" checked />Pria <br>
                  <input type="radio" name="jenis_kelamin" value="wanita" />Wanita
                <?php endif; ?>
              </td>
          
              <td><input type="number" id="usia" name="usia_mahasiswa" value="<?= $mahasiswa['usia']; ?>" maxlength="2" required></td>
              <td><input type="email" id="email" name="email_mahasiswa" value="<?= $mahasiswa['email']; ?>" required></td>
              <td><input type="number" id="nomor" name="no_mahasiswa" value="<?= $mahasiswa['nomor']; ?>" maxlength="13" required></td>
              <td><input type="text" id="alamat" name="alamat_mahasiswa" value="<?= $mahasiswa['alamat']; ?>" required></td>
              <td><textarea id="alasan" name="alasan_mahasiswa" required><?= $mahasiswa['alasan']; ?></textarea></td>
             
             
              <td>
                <button type="submit" name="simpan" class="simpan"><i></i> Simpan</button>
                <button name="batal" class="batal"><i></i> Batal</button>
              </td>
              <input type="hidden" name="id" value="<?= $mahasiswa['id']; ?>">
            </form>
          <?php else : ?>
            <td><?= $mahasiswa['nama']; ?></td>
            <td><?= $mahasiswa['nim']; ?></td>
            <td><?= $mahasiswa['jurusan']; ?></td>
            <td><?= $mahasiswa['stambuk']; ?></td>
            <td><?= $mahasiswa['jenis_kelamin']; ?></td>
            <td><?= $mahasiswa['usia']; ?></td>
            <td><?= $mahasiswa['email']; ?></td>
            <td><?= $mahasiswa['nomor']; ?></td>
            <td><?= $mahasiswa['alamat']; ?></td>
            <td><?= $mahasiswa['alasan']; ?></td>
            <td class="tombol">
              <a href="tabel.php?id=<?= $mahasiswa['id']; ?>&action=edit"><button name="edit" class="edit"><i></i> Edit</button></a>
              <a href="crud.php?id=<?= $mahasiswa['id']; ?>&action=delete"  onclick="return confirm('Apakan Anda yakin ingin menghapus file ini? File ini akan dihapus secara permanen.')"><button name="edit" class="hapus-data"><i></i> Hapus</button></a>
            </td>
          <?php endif; ?>
        </tr>
      <?php endforeach; ?>    <!-- endforeach untuk nampilin data mahasiswanya -->
    </tbody>
  </table>


  <?php if (isset($_POST['simpan'])) : ?>
    <?php if (updateData($_POST) > 0) : ?>
      <script>
        alert('Data sudah berhasil diperbaharui');
        document.location.href = 'tabel.php';
      </script>
    <?php else : ?>
      <script>
        alert('Maaf data gagal diperbaharui');
        document.location.href = '';
      </script>
    <?php endif; ?>
  <?php endif; ?>

  <?php if (isset($_POST['batal'])) : ?>
    <script>
      document.location.href = 'tabel.php'
    </script>
  <?php endif; ?>
</body>

</html>
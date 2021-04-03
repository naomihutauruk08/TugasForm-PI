<?php
require_once("connection_db.php");

if(isset($_GET['id']) && isset($_GET['action'])) {
  if($_GET['action'] == 'delete') {
    deleteWhere('data_mahasiswa','id',$_GET['id']);
  }
}

function getAllData($tbl)
{
  global $conn;
  $query = "SELECT * FROM $tbl";
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}


// function untuk ngambil data mahasiswa
function getAllDataMahasiswa() {
  global $conn;

  $query = "SELECT d.id,d.nama,d.nim,j.jurusan,d.stambuk,d.jenis_kelamin,d.usia,d.email,d.nomor,d.alamat,d.alasan
            FROM data_mahasiswa d JOIN jurusan j ON j.kode_jurusan=d.kode_jurusan";
  $result = mysqli_query($conn,$query);
  $rows = [];
  while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function getWhere($tbl, $field, $condition)
{
  global $conn;
  $query = "SELECT * FROM $tbl WHERE $field = $condition";
  $result = mysqli_query($conn, $query);

  return $result;
}

function deleteWhere($tbl, $field, $condition)
{
  global $conn;
  $query = "DELETE FROM $tbl WHERE $field = $condition";
  mysqli_query($conn, $query);

  if(mysqli_affected_rows($conn) > 0) {
    echo "<script>
            alert('Data berhasil dihapus!');
            document.location.href = 'tabel.php';
          </script>";
  } else {
    echo "<script>
            alert('Data gagal dihapus!');
            document.location.href = 'tabel.php';
          </script>";

  }
}

function tambahData($data)
{
  global $conn;

  $id = '';
  $nama = ucwords(htmlspecialchars($data['nama_mahasiswa']));
  $nim = htmlspecialchars($data['nim_mahasiswa']);
  $jurusan = htmlspecialchars($data['student_courses']);
  $stambuk = htmlspecialchars($data['stambuk_mahasiswa']);
  $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
  $usia = htmlspecialchars($data['usia_mahasiswa']);
  $email = htmlspecialchars($data['email_mahasiswa']);
  $nomor = htmlspecialchars($data['no_mahasiswa']);
  $alamat = htmlspecialchars($data['alamat_mahasiswa']);
  $alasan = htmlspecialchars($data['alasan_mahasiswa']);
  
   $query = "INSERT INTO data_mahasiswa VALUE ('$id','$nim','$nama', '$jurusan', '$stambuk', '$jenis_kelamin', '$usia', '$email', '$nomor', '$alamat', '$alasan',DEFAULT,DEFAULT)";
  mysqli_query($conn, $query);
  $result = mysqli_affected_rows($conn);
  
  return $result;
}

function updateData($data) {
  global $conn;

  $id = $data['id'];
  $nama = ucwords(htmlspecialchars($data['nama_mahasiswa']));
  $nim = htmlspecialchars($data['nim_mahasiswa']);
  $jurusan = htmlspecialchars($data['student_courses']);
  $stambuk = htmlspecialchars($data['stambuk_mahasiswa']);
  $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
  $usia = $data['usia_mahasiswa'];
  $email = htmlspecialchars($data['email_mahasiswa']);
  $nomor = htmlspecialchars($data['no_mahasiswa']);
  $alamat = htmlspecialchars($data['alamat_mahasiswa']);
  $alasan = htmlspecialchars($data['alasan_mahasiswa']);

 $query = "UPDATE data_mahasiswa SET 
            nama = '$nama', nim = '$nim', kode_jurusan = '$jurusan', stambuk = '$stambuk', jenis_kelamin = '$jenis_kelamin', usia = '$usia', email = '$email', nomor = '$nomor', alamat = '$alamat', alasan = '$alasan', updated_at = DEFAULT  
            WHERE id = $id";
  mysqli_query($conn, $query);
  $result = mysqli_affected_rows($conn);

  return $result;
}

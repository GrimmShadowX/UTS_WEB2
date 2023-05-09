<?php
// class induk
class User {
	// property
	protected $id_user;
	protected $kode_user;
	protected $nama;
	protected $telp;
	protected $alamat;
	
	// constructor
	public function __construct($id, $kdu, $nama, $telp, $alamat) {
	  $this->id_user = $id;
	  $this->kode_user = $kdu;
	  $this->nama = $nama;
	  $this->telp = $telp;
	  $this->alamat = $alamat;
	}
  
	// method
	public function getIdUser() {
	  return $this->id_user;
	}
	public function getKodeUser() {
	  return $this->kode_user;
	}
	public function getNama() {
	  return $this->nama;
	}
	public function getTelp() {
	  return $this->telp;
	}
	public function getAlamat() {
	  return $this->alamat;
	}
  }
  
  // class turunan
  class TampilanUser extends User {
	// method
	public function tampilDataUser() {
	  // koneksi ke database
	  $servername = "localhost";
	  $username = "root"; // ganti sesuai dengan username database Anda
	  $password = ""; // ganti sesuai dengan password database Anda
	  $dbname = "playstation";
  
	  $conn = new mysqli($servername, $username, $password, $dbname);
  
	  // cek koneksi
	  if ($conn->connect_error) {
		die("Koneksi gagal: " . $conn->connect_error);
	  }
  
	  // query untuk mengambil data user
	  $sql = "SELECT * FROM user";
	  $result = $conn->query($sql);
  
	  // menampilkan data user dalam bentuk tabel
	  echo "<table border='1'>";
	  echo "<tr>";
	  echo "<th>ID User</th>";
	  echo "<th>Kode User</th>";
	  echo "<th>Nama</th>";
	  echo "<th>Telp</th>";
	  echo "<th>Alamat</th>";
	  echo "</tr>";
  
	  if ($result) {
		if ($result->num_rows > 0) {
		  while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>".$row['id_user']."</td>";
			echo "<td>".$row['kode_user']."</td>";
			echo "<td>".$row['nama']."</td>";
			echo "<td>".$row['telp']."</td>";
			echo "<td>".$row['alamat']."</td>";
			echo "</tr>";
		  }
		} else {
		  echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
		}
	  } else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	  }
  
	  echo "</table>";
  
	  $conn->close();
	}
  }
  
  // objek
  $data_user = new TampilanUser("", "", ""," ", "", "");
  $data_user->tampilDataUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="user.css">
    <title>Data User</title>
</head>
<body>
<tr><a href="index.php"><button type="submit">Kembali ke halaman utama</button></a><tr><tr><tr><tr>
</body></html>
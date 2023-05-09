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
<?php

require_once "app/User.php";
$user = new User();
$rows = $user->tampil();

if(isset($_GET["cari"])){
    $rows = $user->cari($_GET["alamat"]);
}

if(isset($_GET['simpan'])) $vsimpan =$_GET['simpan'];
else $vsimpan ='';
if(isset($_GET['update'])) $vupdate =$_GET['update'];
else $vupdate ='';
if(isset($_GET['reset'])) $vreset =$_GET['reset'];
else $vreset ='';
if(isset($_GET['aksi'])) $vaksi =$_GET['aksi'];
else $vaksi ='';
if(isset($_GET['id'])) $vid =$_GET['id'];
else $vid ='';
if(isset($_GET['kdu'])) $vkdu =$_GET['kdu'];
else $vkdu ='';
if(isset($_GET['nama'])) $vnama =$_GET['nama'];
else $vnama ='';
if(isset($_GET['telp'])) $vtelp =$_GET['telp'];
else $vtelp ='';
if(isset($_GET['alamat'])) $valamat =$_GET['alamat'];
else $valamat ='';

if($vsimpan == 'simpan' && ($vkdu <>'' || $vnama <>'' || $vtelp <>'' || $valamat <>'')) {
        $user->simpan();
        $rows = $user->tampil();
        $vid ='';
        $vkdu ='';
        $vnama ='';
        $vtelp ='';
        $valamat ='';
    }

if($vaksi=="hapus")  {
    $user->hapus();
    $rows = $user->tampil();
}
if($vaksi=="cari")  {
    $rows = $user->cari();
}

 if($vaksi=="lihat_update")  {
    $urows = $user->tampil_update();
    foreach ($urows as $row) {
        $vid = $row['id_user'];
        $vkdu = $row['kode_user'];
        $vnama = $row['nama'];
        $vtelp = $row['telp'];
        $valamat = $row['alamat'];
    }
 }

if ($vupdate=="update"){
    $user->update($vid,$vkdu,$vnama,$vtelp,$valamat);
    $rows = $user->tampil();
    $vid ='';
    $vkdu ='';
    $vnama ='';
    $vtelp ='';
    $valamat ='';
}
if ($vreset=="reset"){
    $vid ='';
    $vkdu ='';
    $vnama ='';
    $vtelp ='';
    $valamat ='';
}


?>

<form action="?" method="get">
<table>

    <tr><td>Kode User</td><td>:</td><td><input type="hidden" name="id" value="<?php echo $vid; ?>" /><input type="text" name="kdu" value="<?php echo $vkdu; ?>" /></td></tr>
    <tr><td>Nama</td><td>:</td><td><input type="text" name="nama" value="<?php echo $vnama; ?>"/></td></tr>
    <tr><td>Telepon</td><td>:</td><td><input type="hidden" name="telp" value="<?php echo $vtelp; ?>" /><input type="text" name="telp" value="<?php echo $vtelp; ?>" /></td></tr>
    <tr><td>Alamat</td><td>:</td><td><input type="text" autocomplete="off" name="alamat" value="<?php echo $valamat; ?>"/></td></tr>
    <tr><td></td><td></td><td>
    <input type="submit" name='simpan' value="simpan"/>
    <input type="submit" name='update' value="update"/>
    <input type="submit" name='reset' value="reset"/>
    <input type="submit" name='cari' value="cari"/>
    </td></tr>
</table>
</form>



    <table border="1px">
    <tr>
        <td>ID</td>
        <td>Kode User</td>
        <td>Nama</td>
        <td>Telepon</td>
        <td>Alamat</td>
        <td>Aksi</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id_user']; ?></td>
            <td><?php echo $row['kode_user']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['telp']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><a href="?id_user=<?php echo $row['id_user']; ?>&aksi=hapus">Hapus</a>&nbsp;&nbsp;&nbsp;
                <a href="?id_user=<?php echo $row['id_user']; ?>&aksi=lihat_update">Update</a>
                &nbsp;&nbsp;&nbsp;</td>

        </tr>
    <?php } ?>
 </table>
</body>
</html>
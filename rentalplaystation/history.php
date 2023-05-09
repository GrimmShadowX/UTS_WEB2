<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="user.css">
    <title>Data Rental</title>
</head>
<body>
<tr><a href="index.php"><button type="submit">Kembali ke halaman utama</button></a><tr><tr><tr><tr>
<?php

require_once "app/Hist.php";
$hist = new Hist();
$rows = $hist->tampil();

if(isset($_GET["cari"])){
    $rows = $hist->cari($_GET["nama"]);
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
if(isset($_GET['kdp'])) $vkdp =$_GET['kdp'];
else $vkdp ='';
if(isset($_GET['nama'])) $vnama =$_GET['nama'];
else $vnama ='';
if(isset($_GET['jp'])) $vjp =$_GET['jp'];
else $vjp ='';
if(isset($_GET['merk'])) $vmerk =$_GET['merk'];
else $vmerk ='';

if($vsimpan == 'simpan' && ($vkdp <>'' || $vnama <>'' || $vjp <>'' || $vmerk <>'')) {
        $hist->simpan();
        $rows = $hist->tampil();
        $vid ='';
        $vkdp ='';
        $vnama ='';
        $vjp ='';
        $vmerk ='';
    }

if($vaksi=="hapus")  {
    $hist->hapus();
    $rows = $hist->tampil();
}
if($vaksi=="cari")  {
    $rows = $hist->cari();
}

 if($vaksi=="lihat_update")  {
    $urows = $hist->tampil_update();
    foreach ($urows as $row) {
        $vid = $row['id_history'];
        $vkdp = $row['kode_ps'];
        $vnama = $row['nama_user'];
        $vjp = $row['jenis_ps'];
        $vmerk = $row['merk'];
    }
 }

if ($vupdate=="update"){
    $hist->update($vid,$vkdp,$vnama,$vjp,$vmerk);
    $rows = $hist->tampil();
    $vid ='';
    $vkdp ='';
    $vnama ='';
    $vjp ='';
    $vmerk ='';
}
if ($vreset=="reset"){
    $vid ='';
    $vkdp ='';
    $vnama ='';
    $vjp ='';
    $vmerk ='';
}


?>

<form action="?" method="get">
<table>

    <tr><td>Kode Playstation</td><td>:</td><td><input type="hidden" name="id" value="<?php echo $vid; ?>" /><input type="text" name="kdp" value="<?php echo $vkdp; ?>" /></td></tr>
    <tr><td>Nama User</td><td>:</td><td><input type="text" autocomplete="off" name="nama" value="<?php echo $vnama; ?>"/></td></tr>
    <tr><td>Jenis Playstation</td><td>:</td><td><input type="hidden" name="jp" value="<?php echo $vjp; ?>" /><input type="text" name="jp" value="<?php echo $vjp; ?>" /></td></tr>
    <tr><td>Merk</td><td>:</td><td><input type="text" name="merk" value="<?php echo $vmerk; ?>"/></td>
    <td>
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
        <td>Kode Playstation</td>
        <td>Nama User</td>
        <td>Jenis Playstation</td>
        <td>Merk</td>
        <td>Aksi</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id_history']; ?></td>
            <td><?php echo $row['kode_ps']; ?></td>
            <td><?php echo $row['nama_user']; ?></td>
            <td><?php echo $row['jenis_ps']; ?></td>
            <td><?php echo $row['merk']; ?></td>
            <td><a href="?id_history=<?php echo $row['id_history']; ?>&aksi=hapus">Hapus</a>&nbsp;&nbsp;&nbsp;
                <a href="?id_history=<?php echo $row['id_history']; ?>&aksi=lihat_update">Update</a>
                &nbsp;&nbsp;&nbsp;</td>
        </tr>
    <?php } ?>
 </table>
</body>
</html>
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

require_once "app/Rent.php";
$rent = new Rent();
$rows = $rent->tampil();

if(isset($_GET["cari"])){
    $rows = $rent->cari($_GET["kdu"]);
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
if(isset($_GET['kdr'])) $vkdr =$_GET['kdr'];
else $vkdr ='';
if(isset($_GET['kdu'])) $vkdu =$_GET['kdu'];
else $vkdu ='';
if(isset($_GET['kdp'])) $vkdp =$_GET['kdp'];
else $vkdp ='';
if(isset($_GET['jam'])) $vjam =$_GET['jam'];
else $vjam ='';
if(isset($_GET['harga'])) $vhg =$_GET['harga'];
else $vhg ='';

if($vsimpan == 'simpan' && ($vkdr <>'' || $vkdu <>'' || $vkdp <>'' || $vjam <>''|| $vhg <>'')) {
        $rent->simpan();
        $rows = $rent->tampil();
        $vid ='';
        $vkdr ='';
        $vkdu ='';
        $vkdp ='';
        $vjam ='';
        $vhg ='';
    }

if($vaksi=="hapus")  {
    $rent->hapus();
    $rows = $rent->tampil();
}
if($vaksi=="cari")  {
    $rows = $rent->cari();
}

 if($vaksi=="lihat_update")  {
    $urows = $rent->tampil_update();
    foreach ($urows as $row) {
        $vid = $row['id_rental'];
        $vkdr = $row['kode_rental'];
        $vkdu = $row['kode_user'];
        $vkdp = $row['kode_ps'];
        $vjam = $row['jam'];
        $vhg = $row['harga'];
    }
 }

if ($vupdate=="update"){
    $rent->update($vid,$vkdr,$vkdu,$vkdp,$vjam,$vhg);
    $rows = $rent->tampil();
    $vid ='';
    $vkdr ='';
    $vkdu ='';
    $vkdp ='';
    $vjam ='';
    $vhg = '';
}
if ($vreset=="reset"){
    $vid ='';
    $vkdr ='';
    $vkdu ='';
    $vkdp ='';
    $vjam ='';
    $vhg ='';
}


?>

<form action="?" method="get">
<table>

    <tr><td>Kode Rental</td><td>:</td><td><input type="hidden" name="id" value="<?php echo $vid; ?>" /><input type="text" name="kdr" value="<?php echo $vkdr; ?>" /></td></tr>
    <tr><td>Kode User</td><td>:</td><td><input type="text" autocomplete="off" name="kdu" value="<?php echo $vkdu; ?>"/></td></tr>
    <tr><td>Kode Playstation</td><td>:</td><td><input type="hidden" name="kdp" value="<?php echo $vkdp; ?>" /><input type="text" name="kdp" value="<?php echo $vkdp; ?>" /></td></tr>
    <tr><td>Jam</td><td>:</td><td><input type="time" name="jam" value="<?php echo $vjam; ?>"/></td></tr>
    <tr><td>Harga</td><td>:</td><td><input type="text" name="harga" value="<?php echo $vhg; ?>"/></td>
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
        <td>Kode Rental</td>
        <td>Kode User</td>
        <td>Kode Playstation</td>
        <td>Jam</td>
        <td>Harga</td>
        <td>Aksi</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id_rental']; ?></td>
            <td><?php echo $row['kode_rental']; ?></td>
            <td><?php echo $row['kode_user']; ?></td>
            <td><?php echo $row['kode_ps']; ?></td>
            <td><?php echo $row['jam']; ?></td>
            <td><?php echo $row['harga']; ?></td>
            <td><a href="?id_rental=<?php echo $row['id_rental']; ?>&aksi=hapus">Hapus</a>&nbsp;&nbsp;&nbsp;
                <a href="?id_rental=<?php echo $row['id_rental']; ?>&aksi=lihat_update">Update</a>
                &nbsp;&nbsp;&nbsp;</td>
        </tr>
    <?php } ?>
 </table>
</body>
</html>
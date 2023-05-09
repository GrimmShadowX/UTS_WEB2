<?php
class Rent {
private $db;
public function __construct()
{
try {

$this->db =
new PDO("mysql:host=localhost;dbname=playstation", "root", "");
} catch (PDOException $e) {
 die ("Error " . $e->getMessage());
 }
}
public function tampil()
    {
        $sql = "SELECT * FROM rental";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }

    public function simpan()
    {
        $sql = "insert into rental values ('','".$_GET['kdr']."','".$_GET['kdu']."','".$_GET['kdp']."','".$_GET['jam']."','".$_GET['harga']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
        
    } 

    public function hapus()
    {
        $sqls = "delete from rental where id_rental='".$_GET['id_rental']."'";
        $stmts = $this->db->prepare($sqls);
        $stmts->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM rental where id_rental='".$_GET['id_rental']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($id,$kdr,$kdu,$kdp,$jam,$harga)
    {
        $sql = "UPDATE rental set kode_rental='".$kdr."', kode_user='".$kdu."', kode_ps='".$kdp."', jam='".$jam."', harga='".$harga."' where id_rental='".$id."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    } 
    public function cari($kdu){
        $sql = "SELECT * FROM rental WHERE kode_user LIKE '%".$kdu."%'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }  
 }
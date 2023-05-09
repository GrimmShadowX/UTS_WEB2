<?php
class Hist {
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
        $sql = "SELECT * FROM history";
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
        $sql = "insert into history values ('','".$_GET['kdp']."','".$_GET['nama']."','".$_GET['jp']."','".$_GET['merk']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
        
    } 

    public function hapus()
    {
        $sqls = "delete from history where id_history='".$_GET['id_history']."'";
        $stmts = $this->db->prepare($sqls);
        $stmts->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM history where id_history='".$_GET['id_history']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($id,$kdp,$nama,$jp,$merk)
    {
        $sql = "UPDATE history set kode_ps='".$kdp."', nama_user='".$nama."', jenis_ps='".$jp."', merk='".$merk."' where id_history='".$id."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    } 
    public function cari($nama){
        $sql = "SELECT * FROM history WHERE nama_user LIKE '%".$nama."%'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }  
 }
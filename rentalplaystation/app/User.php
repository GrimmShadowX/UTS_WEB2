<?php
class User {
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
        $sql = "SELECT * FROM user";
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
        $sql = "insert into user values ('','".$_GET['kdu']."','".$_GET['nama']."','".$_GET['telp']."','".$_GET['alamat']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
        
    } 

    public function hapus()
    {
        $sqls = "delete from user where id_user='".$_GET['id_user']."'";
        $stmts = $this->db->prepare($sqls);
        $stmts->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM user where id_user='".$_GET['id_user']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($id,$kdu,$nama,$telp,$alamat)
    {
        $sql = "UPDATE user set kode_user='".$kdu."', nama='".$nama."', telp='".$telp."', alamat='".$alamat."' where id_user='".$id."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    } 
    public function cari($alamat){
        $sql = "SELECT * FROM user WHERE alamat LIKE '%".$alamat."%'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }  
 }
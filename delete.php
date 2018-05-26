<?php 
//include the database connectivity setting
// <<<<<<< HEAD
if(isset($_GET['s_id'])){
    include('inc/dbconn.php');

    // Get id from URL to delete that user
    $id = $_GET['s_id'];
     
    // Delete user row from table based on given id
    $qr = mysqli_query("SELECT s_id FROM penyewaan WHERE s_id='$id'") or die(mysql_error());
     
    if(mysql_num_rows($qr) == 0){
            
            //jika data tidak ada, maka redirect atau dikembalikan ke halaman beranda
            echo '<script>window.history.back()</script>';
    }else{
            
            //jika data ada di database, maka melakukan query 
            
            $delqr = mysql_query("DELETE FROM penyewaan WHERE s_id='$id'");
            
            //jika query DELETE berhasil
            if($delqr){
                
                echo 'Data siswa berhasil di hapus! ';      //Pesan jika proses hapus berhasil
                echo '<a href="penyewaan.php">Kembali</a>'; //membuat Link untuk kembali ke halaman beranda
                
            }else{
                
                echo 'Gagal menghapus data! ';      //Pesan jika proses hapus gagal
                echo '<a href="penyewaan.php">Kembali</a>'; //membuat Link untuk kembali ke halaman beranda
            
            }
            
        }
        
}

else{
    
    //redirect atau dikembalikan ke halaman beranda
    echo '<script>window.history.back()</script>';
    
}
=======
include_once ("inc/dbconn.php");

$id = $_GET['G_ID'];
$query = mysqli_query($db, "DELETE FROM pegawai WHERE G_ID = $id");

header("Location:pegawai.php");
>>>>>>> master
?>
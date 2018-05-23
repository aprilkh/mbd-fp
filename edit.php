<?php
// including the database connection file
<<<<<<< Updated upstream
include("inc/dbconn.php");
=======
include_once ("inc/dbconn.php");
>>>>>>> Stashed changes
 
if(isset($_POST['update']))
{    
    $id = $_POST['g_id'];
<<<<<<< Updated upstream
    $name=$_POST['g_nama'];
    $alamat=$_POST['g_alamat'];
    $nohp=$_POST['g_nohp']; 
    $tglmasuk=$_POST['g_tglmasuk']; 
    $bagian=$_POST['g_bagian']; 
    $jk=$_POST['g_jk']; 

    
    // checking empty fields
    if(empty($name) || empty($alamat) || empty($nohp) || empty($tglmasuk) || empty($bagian) || empty($jk)) {            
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
=======
    $nama = $_POST['g_nama'];
    $alamat = $_POST['g_alamat'];
    $nohp = $_POST['g_nohp'];
    $tglmasuk = $_POST['g_tglmasuk'];
    $bagian = $_POST['g_bagian'];
    $jk = $_POST['g_jk'];   
    
    // checking empty fields
    if(empty($nama) || empty($alamat) || empty($nohp) || empty($tglmasuk) || empty($bagian) || empty($jk)) {            
        if(empty($nama)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
>>>>>>> Stashed changes
        if(empty($alamat)) {
            echo "<font color='red'>Alamat field is empty.</font><br/>";
        }
        
        if(empty($nohp)) {
<<<<<<< Updated upstream
            echo "<font color='red'>No Hp field is empty.</font><br/>";
        }        
        if(empty($tglmasuk)) {
            echo "<font color='red'>Tanggal Masuk field is empty.</font><br/>";
        }        
        if(empty($bagian)) {
            echo "<font color='red'>Bagian field is empty.</font><br/>";
        }        
        if(empty($jk)) {
            echo "<font color='red'>Jenis Kelamin field is empty.</font><br/>";
        }        
      
    } else {    
        //updating the table
        $qr = mysqli_query($mysqli, "UPDATE pegawai SET g_nama='$name',g_alamat='$alamat',g_nohp='$nohp',g_tglmasuk='$tglmasuk',g_bagian='bagian',g_jk='jk' WHERE g_id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: pegawai.php");
=======
            echo "<font color='red'>Nohp field is empty.</font><br/>";
        }    
        if(empty($tglmasuk)) {
            echo "<font color='red'>Tglmasuk field is empty.</font><br/>";
        }
        if(empty($bagian)) {
            echo "<font color='red'>Bagian field is empty.</font><br/>";
        }
        if(empty($jk)) {
            echo "<font color='red'>Jk field is empty.</font><br/>";
        }             
    } else {    
        //updating the table
        $qr = mysqli_query($sqlconnect, "UPDATE pegawai SET nama='$g_nama',alamat='$g_alamat',nohp='$g_nohp',tglmasuk='$g_tglmasuk',bagian='$g_bagian',jk='$g_jk' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: php-db-template.php");
>>>>>>> Stashed changes
    }
}
?>
<?php
//getting id from url
$id = $_GET['g_id'];
 
//selecting data associated with this particular id
<<<<<<< Updated upstream
$qr = mysqli_query($mysqli, "SELECT * FROM pegawai WHERE g_id=$id");
 
while($data = mysqli_fetch_array($qr))
{
    $name = $data['g_nama'];
=======
$qr = mysqli_query($sqlconnect, "SELECT * FROM pegawai WHERE id=$id") or die("Error: ".mysqli_error($sqlconnect));
// $query = mysqli_query($db,$qr);
while($data = mysqli_fetch_array($qr))
{
    $nama = $data['g_nama'];
>>>>>>> Stashed changes
    $alamat = $data['g_alamat'];
    $nohp = $data['g_nohp'];
    $tglmasuk = $data['g_tglmasuk'];
    $bagian = $data['g_bagian'];
    $jk = $data['g_jk'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
<<<<<<< Updated upstream
    <a href="pegawai.php">Home</a>
=======
    <a href="php-db-template.php">Home</a>
>>>>>>> Stashed changes
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="name" value="<?php echo $nama;?>"></td>
            </tr>
            <tr> 
                <td>Alamat</td>
<<<<<<< Updated upstream
                <td><input type="text" name="alamat" value="<?php echo $alamat;?>"></td>
            </tr>
            <tr> 
                <td>No Hp</td>
                <td><input type="text" name="nohp" value="<?php echo $nohp;?>"></td>
            </tr>
            <tr> 
                <td>Tanggal Masuk</td>
                <td><input type="text" name="tglmasuk" value="<?php echo $tglmasuk;?>"></td>
            </tr>
            <tr> 
                <td>Bagian</td>
                <td><input type="text" name="bagian" value="<?php echo $bagian;?>"></td>
            </tr>
            <tr> 
                <td>Jenis Kelamin</td>
                <td><input type="text" name="jk" value="<?php echo $jk;?>"></td>
=======
                <td><input type="text" name="age" value="<?php echo $alamat;?>"></td>
            </tr>
            <tr> 
                <td>No Hp</td>
                <td><input type="text" name="email" value="<?php echo $nohp;?>"></td>
            </tr>
            <tr>
                <td>Tanggal Masuk</td>
                <td><input type="text" name="email" value="<?php echo $tglmasuk;?>"></td>
            </tr>
            <tr>
                <td>Bagian</td>
                <td><input type="text" name="email" value="<?php echo $bagian;?>"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td><input type="text" name="email" value="<?php echo $jk;?>"></td>
>>>>>>> Stashed changes
            </tr>

            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
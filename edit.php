<?php
// including the database connection file
include("inc/dbconn.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['g_id'];
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
        if(empty($alamat)) {
            echo "<font color='red'>Alamat field is empty.</font><br/>";
        }
        
        if(empty($nohp)) {
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
    }
}
?>
<?php
//getting id from url
$id = $_GET['g_id'];
 
//selecting data associated with this particular id
$qr = mysqli_query($mysqli, "SELECT * FROM pegawai WHERE g_id=$id");
 
while($data = mysqli_fetch_array($qr))
{
    $name = $data['g_nama'];
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
    <a href="pegawai.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td>Alamat</td>
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
            </tr>

            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
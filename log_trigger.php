<form name="update" method="post" action="trigger-april.php">
		<table border="0">
			<tr> 
				<td>Nama</td>
				<td><input type="text" name="name" value=<?php echo $a_nama;?>></td>
			</tr>
			<tr> 
				<td>Merk</td>
				<td><input type="text" name="merk" value=<?php echo $a_merk;?>></td>
			</tr>
			<tr> 
				<td>Harga Sewa</td>
				<td><input type="text" name="harga sewa" value=<?php echo $a_hargasewa;?>></td>
			</tr>
			<tr> 
				<td>Stok</td>
				<td><input type="text" name="stok" value=<?php echo $a_stok;?>></td>
			</tr>
			<tr> 
				<td>Tanggal Perubahan</td>
				<td><input type="text" name="stok" value=<?php echo $tanggal_perubahan;?>></td>
			</tr>
			<tr> 
				<td>Status</td>
				<td><input type="text" name="stok" value=<?php echo $status;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="a_id" value=<?php echo $_GET['a_id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
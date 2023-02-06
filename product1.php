<br>
	

	<?php
	
	$sqlprod="select * from produk where id_kategori like '%".$_GET['idkat']."%'";
	$record=$con->query($sqlprod);
	while($datagambar=$record->fetch_array())
	{
	?>
		<div class="col-sm-3">
		<div class="panel panel-info">
		<div class="panel-heading"><?php echo $datagambar['nama_barang']; ?></div>
		<div class="panel-body">
		<img src="<?php echo $datagambar['gambar']; ?>" width="100%">
		<hr>
		<p style="color:#ef017c;"><i class="fa fa-tag"> Rp.<?php echo $datagambar['harga']; ?></i></p>
		</div>
		<div class="panel-footer">
		<a href="<?php echo $hal; ?>?page=produk_detail&id=<?php echo $datagambar['kode_barang']; ?>"><button class="btn btn-primary"><i class="fa fa-camera"> Detail</i></button></a>
		<a href="?page=product&id=<?php echo $datagambar['kode_barang']; ?>&harga=<?php echo $datagambar['harga']; ?>&beli=1"><button class="btn btn-success"><i class="fa fa-shopping-cart"> Beli</i></button></a>
		</div>
		</div>
		</div>
	<?php }

if(isset($_GET['beli']))
{
	$kodeb=$_GET['id'];
	$tgl=date("Y-m-d");
	$jml=1;
	$harga=$_GET['harga'];

 	$sqlkeranjang="select * from belanja inner join barang on barang.kode_barang=belanja.kode_barang where username='$username' AND belanja.kode_barang='$kodeb'";
    $reckeranjang=$con->query($sqlkeranjang);
    $databelanja=$reckeranjang->fetch_array();



	if($reckeranjang->num_rows < 1)
	{
		$sqlbeli="INSERT INTO `belanja`(`kode_barang`, `jumlah_barang`, `tgl_belanja`, `total_belanja`, `username`) VALUES ('$kodeb','$jml','$tgl','$harga','$username')";
		$simpan=$con->query($sqlbeli);
		header('location:member.php?page=keranjang');
	}
	else
	{
		$jmlnow=intval($databelanja['jumlah_barang'])+1;
		$totalnow=intval($jmlnow)*intval($harga);
		$sqlupdate="UPDATE belanja set jumlah_barang=$jmlnow, total_belanja=$totalnow WHERE id_belanja='".$databelanja['id_belanja']."'";
		$update=$con->query($sqlupdate);

		
		header('location:member.php?page=keranjang');
	}
}


	?>

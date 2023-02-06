	<?php 
	$sqlprod="select * from produk where kode_barang='".$_GET['id']."'";
	$record=$con->query($sqlprod);
	while($datagambar=$record->fetch_array())
	{
	?>
		<div class="col-sm-12" align="center">
		<div class="panel panel-info">
		<div class="panel-heading"> <?php echo $datagambar['nama_barang']; ?></div>
		<div class="panel-body">
		<img src="<?php echo $datagambar['gambar']; ?>" width="50%">
		<p style="color:#ef017c;"><i class="fa fa-tag"> Rp.<?php echo $datagambar['harga']; ?></i></p>
		<p><?php echo $datagambar['deskripsi_barang']; ?></p>
		<p>Berat : <?php echo $datagambar['berat']; ?> Kg</p>
		</div>
		<div class="panel-footer">
		<a href="member.php?page=product&id=<?php echo $datagambar['kode_barang']; ?>&harga=<?php echo $datagambar['harga']; ?>&beli=1"><button class="btn btn-success"><i class="fa fa-shopping-cart"> Beli</i></button></a>
		</div>
		</div>
		</div>
		<?php }?>
		
    	
   
    	
  
    	
    	
    	
    	
    	
    	
    	
    	
    	
<?php 
$sqlcektrans="SELECT * FROM transaksi WHERE kode_transaksi='".$_GET['id']."'";
$rowcek=$con->query($sqlcektrans);
$datatrans=$rowcek->fetch_array();
?>



<h2>Kode Transaksi : <?php echo $_GET['id']; ?></h2>
<h2>Tanggal Transaksi : <?php echo date("d M Y",strtotime($datatrans['tgl_trans'])); ?></h2>
<hr>
<div class="panel panel-primary">
	<div class="panel-heading">Detail Transaksi</div>
	<div class="panel-body">
		<table class="table table-bordered table-striped" >
			<thead>
				<tr>
					<th>No</th>
					<th>Item</th>
					<th>Harga</th>
					<th>Jumlah Beli</th>
					<th>Total Belanja</th>
				</tr>
			</thead>
			<tbody>
					<?php
						$sqlkeranjang="SELECT * FROM detail_transaksi INNER JOIN product ON product.id_product=detail_transaksi.id_product WHERE kode_transaksi='".$_GET['id']."'";
						$rowtransaksi=$con->query($sqlkeranjang);
						while($databelanja=$rowtransaksi->fetch_array()){$no +=1;
					?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $databelanja['nama_product']; ?></td>
					
					<td align="right"><?php echo "Rp ".number_format($databelanja['harga'],0,',','.'); ?></td>
					<td align="center"><?php echo $databelanja['jml_beli']; ?></td>
					<td align="right"><?php echo "Rp ".number_format($databelanja['subtotal'],0,',','.'); ?></td>

				</tr>
				
				<?php $gt +=$databelanja['subtotal']; } ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" align="right">Grand Total</td>
					<td align="right"><?php echo "Rp ".number_format($gt,0,',','.'); ?></td>

				</tr>
			</tfoot>
		</table>
	</div>

</div>
<?php



$statusbayar=$datatrans['status'];
	if($statusbayar=="Lunas")
	{
		echo "<img width='500px' src='image/lunas.jpg' />";
	}
	else
	{
?>
<div class="panel panel-default">
	<div class="panel-heading">Konfirmasi Pembayaran</div>
	<div class="panel-body">
		<form role="form" action="" method="post" enctype="multipart/form-data">
			<table class="table">
				<tr>
					<td>Nama Bank</td>
					<td>
						<select name="bank" class="form-control">
							<option>BCA</option>
							<option>BRI</option>
							<option>BNI</option>
							<option>Mandiri</option>
						</select>

					</td>
				</tr>
				<tr>
					<td>Nomor Rekening</td>
					<td><input type="text" class="form-control" name="norek" required></td>
				</tr>				
				<tr>
					<td>Nama Pemilik Rekening</td>
					<td><input type="text" class="form-control" name="namareknening" required></td>
				</tr>
				<tr>
					<td>Nominal Transfer</td>
					<td><input type="number" class="form-control" name="nominal"></td>
				</tr>
				<tr>
					<td>Upload Bukti Transfer</td>
					<td><input type="file" class="form-control" name="upload"></td>
				</tr>
				<tr>
					<td align="right" colspan="2"><input class="btn btn-success" type="submit" value="Kirim"></td>
					
				</tr>
			</table>
		</form>
	</div>
</div>
<?php } ?>



<?php
$gambar=$_FILES['upload']['tmp_name'];
$namrek=$_POST['namareknening'];
$nominal=$_POST['nominal'];
$bank=$_POST['bank'];
$norek=$_POST['norek'];


$detailbank="Transfer dari Bank $bank<br>Nomor Rekening $norek a.n $namrek <br> Nominal : $nominal";

$renupload="image/Bukti/kode-transaksi(".$_GET['id'].").".pathinfo($_FILES['upload']['name'],PATHINFO_EXTENSION);

if(isset($nominal))
{
	$qrybank="UPDATE transaksi SET status='Verifikasi Pembayaran', bukti_transfer='$renupload',detail_bank='$detailbank' WHERE kode_transaksi='".$_GET['id']."' ";
	$simpan=$con->query($qrybank);
	move_uploaded_file($gambar, $renupload);
	header('location:?page=transaksi');
}


?>
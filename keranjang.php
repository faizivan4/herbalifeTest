<h1>Keranjang Belanja</h1><hr>
<div class="panel panel-primary">
	<div class="panel-heading">Keranjang Belanja</div>
	<div class="panel-body">
		<table class="table table-bordered table-striped" >
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Item</th>
					<th>Harga</th>
					<th>Jumlah Beli</th>
					<th>Total Belanja</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
					<?php
						$sqlkeranjang="SELECT * FROM keranjang_belanja INNER JOIN product ON product.id_product=keranjang_belanja.id_product WHERE username='$user'";
						$rowtransaksi=$con->query($sqlkeranjang);
						while($databelanja=$rowtransaksi->fetch_array()){$no +=1;
					?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $databelanja['tgl_transaksi']; ?></td>
					<td><?php echo $databelanja['nama_product']; ?></td>
					
					<td align="right"><?php echo "Rp ".number_format($databelanja['harga'],0,',','.'); ?></td>
					<td align="center"><?php echo $databelanja['jml_beli']; ?></td>
					<td align="right"><?php echo "Rp ".number_format($databelanja['total_belanja'],0,',','.'); ?></td>
					<td align="center"><a href="?page=keranjang&id=<?php echo $databelanja['id_transaksi']; ?>&del=1" class="fa fa-trash-o fa-fw fa-2x"></a></td>
				</tr>
				
				<?php $gt +=$databelanja['total_belanja']; } ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="5" align="right">Grand Total</td>
					<td align="right"><?php echo "Rp ".number_format($gt,0,',','.'); ?></td>
					<td></td>
				</tr>
			</tfoot>
		</table>
	</div>

	<div class="panel-footer">
		<a class="btn btn-primary" href="?page=keranjang&total=<?php echo $gt; ?>&chk=1">Checkout</a>
	</div>

</div>

<?php
	if(isset($_GET['del']))
	{
		$deletebelanja=$con->query("DELETE FROM keranjang_belanja WHERE id_transaksi='".$_GET['id']."'");
		header('location:?page=keranjang');
	}


if(isset($_GET['chk']))
{

$cek=$con->query("select * from transaksi");
$jmltrans=$cek->num_rows;
$numbering=str_pad($jmltrans+1,5,"0",STR_PAD_LEFT);
$tang=date("dm");
$kode="$tang-$numbering";
$grandtotal=$_GET['total'];

$sqlfak="INSERT INTO `transaksi`(`kode_transaksi`, tgl_trans, `username`, `subtotal`, `status`) VALUES ('$kode','".date("Y-m-d")."','$user','$grandtotal','Menunggu Pembayaran')";
$faktur=$con->query($sqlfak); 

$sqlsim="INSERT INTO `detail_transaksi`(`kode_transaksi`, `id_product`, `jml_beli`, `subtotal`, `username`) select transaksi.kode_transaksi, keranjang_belanja.id_product, keranjang_belanja.jml_beli,keranjang_belanja.total_belanja,keranjang_belanja.username from keranjang_belanja INNER JOIN transaksi ON keranjang_belanja.username=transaksi.username JOIN product ON keranjang_belanja.id_product=product.id_product where transaksi.kode_transaksi='$kode' AND keranjang_belanja.username='$user' ";
$simpan=$con->query($sqlsim); 

$sqldelbel=$con->query("DELETE from keranjang_belanja where username='$user'");
header('location:?page=transaksi');
}


?>







<!-- 

$cek=$con->query("select * from transaksi");
$jmltrans=$cek->num_rows;
$numbering=str_pad($jmltrans+1,5,"0",STR_PAD_LEFT);
$tang=date("dm");
$kode="$tang-$numbering";


$sqlfak="INSERT INTO `transaksi`(`kode_transaksi`, tgl_trans, `username`, `subtotal`, `status`) VALUES ('$kode','".date("Y-m-d")."','$user','$grandtotal','Menunggu Pembayaran')";
$faktur=$con->query($sqlfak); 

$sqlsim="INSERT INTO `detail_transaksi`(`kode_transaksi`, `id_product`, `jml_beli`, `subtotal`, `username`) select transaksi.kode_transaksi, keranjang_belanja.id_product, keranjang_belanja.jml_beli,keranjang_belanja.total_belanja,keranjang_belanja.username from keranjang_belanja INNER JOIN transaksi ON keranjang_belanja.username=transaksi.username JOIN product ON keranjang_belanja.id_product=product.id_product where keranjang_belanja.kode_transaksi='$kode' AND transaksi_belanja.username='$username' ";
$simpan=$con->query($sqlsim); 



-->




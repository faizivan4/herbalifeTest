<h1>Riwayat  Transaksi</h1><hr>
<div class="panel panel-primary">
	<div class="panel-heading">Daftar Transaksi</div>
	<div class="panel-body">
		<table class="table table-bordered table-striped" >
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Kode Transaksi</th>
					<th>Total Belanja</th>
					<th>Status</th>
					<th>Bukti</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
					<?php
						$sqlkeranjang="SELECT * FROM transaksi ";
						$rowtransaksi=$con->query($sqlkeranjang);
						while($databelanja=$rowtransaksi->fetch_array()){$no +=1;
					?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $databelanja['tgl_trans']; ?></td>
					<td><?php echo $databelanja['kode_transaksi']; ?></td>
					<td align="right"><?php echo "Rp ".number_format($databelanja['subtotal'],0,',','.'); ?></td>
					<td><?php echo $databelanja['status']; ?></td>
					<td><?php echo $databelanja['detail_bank']; ?><br><img width="300px" src="<?php echo $databelanja['bukti_transfer']; ?>" ></td>
					<td align="center">

					<?php if($databelanja['bukti_transfer']!="")
						{

					?>
					<a href="?pages=transaksi&id=<?php echo $databelanja['kode_transaksi']; ?>" class="btn btn-success">Konfirmasi</a>
					<?php } ?>
					</td>
				</tr>
				
				<?php $gt +=$databelanja['subtotal']; } ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="3" align="right">Grand Total</td>
					<td align="right"><?php echo "Rp ".number_format($gt,0,',','.'); ?></td>
					<td colspan="3"></td>
				</tr>
			</tfoot>
		</table>
	</div>


</div>

<?php
$kode=$_GET['id'];
if(isset($kode))
{
	$updatestatus=$con->query("UPDATE transaksi SET status='Lunas' WHERE kode_transaksi='$kode'");
	header('location:?pages=transaksi');
}

?>
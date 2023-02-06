<h1>Histori Transaksi</h1><hr>
<div class="panel panel-primary">
	<div class="panel-heading">List Transaksi</div>
	<div class="panel-body">
		<table class="table table-bordered table-striped" >
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Kode Transaksi</th>
					<th>Total Belanja</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
					<?php
						$sqlkeranjang="SELECT * FROM transaksi WHERE username='$user'";
						$rowtransaksi=$con->query($sqlkeranjang);
						while($databelanja=$rowtransaksi->fetch_array()){$no +=1;
					?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $databelanja['tgl_trans']; ?></td>
					<td><?php echo $databelanja['kode_transaksi']; ?></td>
					<td align="right"><?php echo "Rp ".number_format($databelanja['subtotal'],0,',','.'); ?></td>
					<td align="center"><a href="?page=detail_trans&id=<?php echo $databelanja['kode_transaksi']; ?>" class="fa fa-th-list fa-fw fa-2x"></a></td>
				</tr>
				
				<?php $gt +=$databelanja['subtotal']; } ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="3" align="right">Grand Total</td>
					<td align="right"><?php echo "Rp ".number_format($gt,0,',','.'); ?></td>
					<td></td>
				</tr>
			</tfoot>
		</table>
	</div>


</div>
<h1>Keranjang Belanja</h1><hr>
<div class="panel panel-primary">
	<div class="panel-heading">Keranjang Belanja</div>
	<div class="panel-body">
		<table class="table table-bordered table-striped" id="list-data" width="100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Item</th>
					<th>Harga</th>
					<th>Jumlah Beli</th>
					<th>Total Belanja</th>
				</tr>
			</thead>
			<tbody>
					<?php
						$sqlkeranjang="SELECT * FROM transaksi INNER JOIN product ON product.id_product=transaksi.id_product WHERE username='".$_GET['id']."'";
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

				</tr>
				
				<?php $gt +=$databelanja['total_belanja']; } ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="5" align="right">Grand Total</td>
					<td align="right"><?php echo "Rp ".number_format($gt,0,',','.'); ?></td>

				</tr>
			</tfoot>
		</table>
	</div>

</div>














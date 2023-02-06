<div class="panel panel-primary">
	<div class="panel-heading">Daftar Pelangan</div>
	<div class="panel-body">
		<table class="table table-striped table-bordered" id="list-data" width="100%">
			<thead>
				<tr>
					<th width="70">No</th>
					<th>Gambar</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Telepon</th>
					<th>Username</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
<?php $qrycustomer='select * from customer';
$reccustomer=$con->query($qrycustomer);
while($datacustomer=$reccustomer->fetch_array()){ $no +=1;?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td align="center"><img width="80px" height="100px" class="img-rounded" src="<?php echo $datacustomer['customer_photo']; ?>"></td>
					<td><?php echo $datacustomer['customer_name']; ?></td>
					<td><?php echo $datacustomer['customer_address']; ?></td>
					<td><?php echo $datacustomer['customer_phone']; ?></td>
					<td><?php echo $datacustomer['username']; ?></td>
					<td>
					<a class="btn btn-success btn-xs btn-block" href="?pages=transaksi-detail&id=<?php echo $datacustomer['username']; ?>"><i class="fa fa-money fa-fw"></i> Transaksi</a>
					<a class="btn btn-danger btn-xs btn-block" href="?pages=pelanggan&id=<?php echo $datacustomer['username']; ?>"><i class="fa fa-trash-o fa-fw"></i> Delete</a></td>
				</tr>
<?php } ?>

			</tbody>
		</table>
	</div>
</div>
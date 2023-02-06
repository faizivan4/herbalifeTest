<head>
	<style type="text/css">

	#list-produk{min-height: 600px;}
	#list-produk label{ margin: 10px; font-size: 20px; }
	.col-md-12{ padding: 0; margin-top: 10px; }
	#jml{ width: 70px; }
	</style>
</head>
<?php
$qryproduct="select * from product INNER JOIN kategori ON kategori.id_kategori=product.id_kategori WHERE id_product='".$_GET['id']."'";
$recproduct=$con->query($qryproduct);
$dataproduct=$recproduct->fetch_array();
?>
<div class="row" id="list-produk">
<div class="panel panel-primary col-md-12">
	<div class="panel-heading">Detail Product</div>
	<div class="panel-body">
		<form id="order" action="proses-order.php" method="post">
			<table class="table table-bordered">
				<tr>
					<td colspan="2"><img width="300px" height="300px" class="img-rounded" src="<?php echo $dataproduct['gambar']; ?>"></td>
					<td rowspan="7"><?php echo $dataproduct['deskripsi']; ?></td>
				</tr>
				<tr>
					<td>Nama Produk</td>
					<td><?php echo $dataproduct['nama_product']; ?></td>
				</tr>
				<tr>
					<td>Kategori</td>
					<td><?php echo $dataproduct['nama_kategori']; ?></td>
				</tr>
				<tr>
					<td>Harga</td>
					<td><?php echo "Rp ".number_format($dataproduct['harga'],0,',','.'); ?><input type="hidden" name="harga" value="<?php echo $dataproduct['harga']; ?>"></td>
				</tr>
				<input type="hidden" name="id" value="<?php echo $dataproduct['id_product']; ?>">
				<tr>
					<td>Jumlah beli</td>
					<td><input id="jml" value="1" name="jml" type="number" class="form-control" onchange="calldata('#order','hitung.php','#total');"></td>
				</tr>

				<tr>
					<td>Total Harga</td>
					<td><div id="total">
<script type="text/javascript">
	
	    function calldata(formObj, url, responseDIV)
{
    var image_load = "<div class='overlay'> <i class='fa fa-refresh fa-spin'></i> Wait....</div>";
    $.ajax({
        url: url,
        beforeSend: function(){
            $(responseDIV).html(image_load);
        }, 
        data: $(formObj).serialize(), 
        type: "post", 
        dataType: "html", 
        success: function(response){
            $(responseDIV).html(response);
        },
        error: function(){
            alert("Something Wrong!");
        },
    });
    return false;
}
</script>
<input type="hidden" name="total" class="form-control" value="<?php echo $dataproduct['harga']*1; ?>">

					<?php echo "Rp ".number_format($dataproduct['harga']*1,0,',','.'); ?><input class="form-control" type="hidden" value="<?php echo $dataproduct['harga']*1; ?>"></div></td>
				</tr>
				<tr>
					<td colspan="2" align="right"><input type="submit" value="Konfirmasi"></td>
				</tr>
			</table>
		</form>
	</div>
	<div class="panel-footer" align="right"><a href="?page=product">Kembali</a></div>
	
</div>

</div>

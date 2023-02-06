<head>
	<style type="text/css">
	.col-md-3{ padding: 0; }
	.btn-beli{ float: right;position: relative; margin: 10px; width: 100px; }
	.panel-footer {padding: 0; float: left; width: 100%; position: relative;}
	#list-produk{min-height: 600px; }
	#list-produk label{ margin: 10px; font-size: 20px; }
	#kategori{padding: 0;}
	#kategori ul li{ list-style: none; padding-top:10px;padding-bottom:10px; margin: 0;}
	#kategori ul{ padding: 0; }

	</style>
</head>


<br>
	<div>
		<form action="">
			<div class="input-group">
				<div class="input-group">
                                <input type="text" name="cari" class="form-control" placeholder="Cari produk">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
         

			</div>
			
		</form>
	</div>
	<br>
<div class="row">
			<div class="row" id="list-produk">
		<?php

		$idkate=$_GET['idkat'];
		$qryproduct="select * from product INNER JOIN kategori ON kategori.id_kategori=product.id_kategori WHERE product.id_kategori='$idkate'";
		$recproduct=$con->query($qryproduct);
		while($dataproduct=$recproduct->fetch_array()){?>


		<div class="panel panel-default col-md-3" style="margin-right: 10px;">
			<div class="panel-heading"><?php echo $dataproduct['nama_product']; ?></div>
			<div class="panel-body" align="center"><img width="200px" height="300px" class="img-rounded" src="<?php echo $dataproduct['gambar']; ?>"></div>
			<form>
			<div class="panel-footer"><label><?php echo "Rp ".number_format($dataproduct['harga'],0,',','.'); ?></label><a class="btn btn-primary btn-beli" href="?page=order&id=<?php echo $dataproduct['id_product'];?>">Beli</a></div>
			</form>
		</div>
		<?php

		}

		?>
		</div>
</div>






<?php
	if(isset($user))
	{

	}
?>
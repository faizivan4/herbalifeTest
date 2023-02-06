<?php
	$harga=$_POST['harga'];
	$jml=$_POST['jml'];

	$total=$harga*$jml;

	echo "Rp ".number_format($total,0,',','.');

?>
<input type="hidden" name="total" class="form-control" value="<?php echo $total; ?>">
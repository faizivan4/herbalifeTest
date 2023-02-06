<?php 
ob_start();
error_reporting(E_ALL ^ E_NOTICE);
session_start();
include "koneksi.php";
    $user=$_SESSION['user'];
    $access=$_SESSION['access'];
$page=$_GET['page'];

?>

<?php
	$jml=$_POST['jml'];
	$idpro=$_POST['id'];
	$total=$_POST['total'];
	$tgl=date('Y-m-d');

	if($access=="customer")
	{
		if($jml > 0)
		{
			$qryinputorder="INSERT INTO keranjang_belanja (tgl_transaksi, id_product, jml_beli, total_belanja, username,status_order) VALUES ('$tgl','$idpro','$jml','$total','$user','new order')";
			$simpan=$con->query($qryinputorder);
					echo "<script>window.location='customer.php?page=product'</script>";

		}
		else
		{
			echo "<script>alert('Masukan Jumlah yang valid')</script>";
			echo "<script>window.location='customer.php?page=order&id=$idpro'</script>";
		}
	}
	else
	{
		echo "<script>alert('Untuk melanjutkan transaksi, Anda Harus Login terlebih dahulu')</script>";
		echo "<script>window.location='index.php'</script>";
	}
?>
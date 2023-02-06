<head>
<style>
td{
	padding: 5px;
}

</style>
</head>



<h1 class="page-header">Data Berita</h1>


<form role="form" action="" method="post">
<table width="95%">
<tr><td nowrap="nowrap">JUDUL</td><td><input type="text" class="form-control" name="Judul" required/></td></tr>
<tr><td nowrap="nowrap">ISI BERITA</td><td><textarea id="editor" cols="100" rows="3" class="form-control" name="isi" required></textarea></td></tr>

<tr><td colspan="3" align="right"><input class="btn btn-primary" type="submit" /></td></tr>

 
</table>
</form>


<br /><br />

<?php 
include "pages/$access/list_berita.php";

$judul=$_POST['Judul'];
$isi=$_POST['isi'];
$tglberita=date('Y-m-d');




$fl="`Judul`, `isi`, `tgl_berita`";

$val="'$judul','$isi','$tglberita'";

$sql="INSERT INTO berita ($fl) VALUES ($val)";


if(isset($judul))
{
$simpan=$con->query($sql);
echo "<script>alert('Berita Sudah dimuat')</script>";

	header('location:?pages=berita');

}


?>
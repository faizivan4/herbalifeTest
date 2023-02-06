<head>
<style>
td{
	padding: 5px;
}

</style>
</head>

  <?php 
$qryberita="select * from berita WHERE id_berita='".$_GET['id']."'";
$recberita=$con->query($qryberita);
$databerita=$recberita->fetch_array();
  ?>

<h1 class="page-header">Data Berita</h1>

<div class="row">
<form role="form" action="" method="post">
<table width="95%">
<tr><td nowrap="nowrap">JUDUL</td><td><input type="text" class="form-control" name="Judul" value="<?php echo $databerita['Judul']; ?>" required/></td></tr>

<tr><td nowrap="nowrap">ISI BERITA</td><td><textarea id="editor" cols="100" rows="5" class="form-control" name="isi" required><?php echo $databerita['isi']; ?></textarea></td></tr>

<tr><td colspan="3" align="right"><input class="btn btn-primary" type="submit" /></td></tr>

 
</table>
</form>


<br /><br />
</div>
<?php 

$judul=$_POST['Judul'];
$isi=$_POST['isi'];
$tglberita=$_POST['tglberita'];




$fl="`Judul`='$judul', `isi`='$isi'";


$sql="UPDATE berita SET $fl WHERE id_berita='".$_GET['id']."'";


if(isset($judul))
{
$simpan=$con->query($sql);
	header('location:?pages=berita');
}


?>
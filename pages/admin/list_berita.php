<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
th{
	text-transform: uppercase;
	text-align: center;
}
#list-isi{
	overflow-y: scroll;
	height: 200px;
}
.btn-ctrl{
	position: relative;
	width: 100%;
	margin-bottom: 15px;
}
</style>
</head>

<body>

<table class="table table-bordered table-striped" id="list-data">
<thead>
  <tr>
	<th nowrap="nowrap">TGL BERITA</th>
	<th nowrap="nowrap">JUDUL</th>
	<th>ISI BERITA</th>

	<th nowrap="nowrap">Action</th>
  </tr>
 </thead>
 <tbody>
  <?php 
  $qryberita="select * from berita";
$recberita=$con->query($qryberita);
while($databerita=$recberita->fetch_array()){
  ?>
  <tr>
<td align="center"><?php echo $databerita['tgl_berita']; ?></td>
<td><?php echo $databerita['Judul']; ?></td>
<td><div id="list-isi"><?php echo $databerita['isi']; ?></div></td>

<td align="center">
<a href="dashboard.php?pages=<?php echo $_GET['pages'];?>&id=<?php echo $databerita['id_berita']; ?>&del=1" class="btn btn-danger btn-ctrl">Delete</a>
<a href="dashboard.php?pages=edit_berita&id=<?php echo $databerita['id_berita']; ?>" class="btn btn-success btn-ctrl">Edit</a></td>
  </tr>
  <?php }?>
</tbody>
<tfoot>
  <tr>
    <td colspan="4">&nbsp;</td>

  </tr>
 </tfoot>
</table>

</body>
</html>
<?php 
if(isset($_GET['del']))
{
	$sqldel="DELETE FROM `berita` WHERE `id_berita` ='".$_GET['id']."'";
	
	$delete=$con->query($sqldel);
	header('location:dashboard.php?pages='.$_GET['pages']);
}

?>
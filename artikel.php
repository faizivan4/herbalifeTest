<head>
	<style type="text/css">
	.container {width: 100%; margin:0;}
	.col-md-2{ margin: 0; padding:0; margin-right: 60px; }
	#list-artikel{ position: relative; width: 100%; padding: 0; }
	#list-artikel li{ background-color: #2d97d8; color: #fff; font-weight: bolder; padding-top: 10px; padding-bottom: 10px; padding-left: 10px; margin: 0; border-top: 1px;border-bottom: 1px;}
	#list-artikel li:hover{background-color: #0c0d0d;}
	#menu-artikel{ padding: 0; min-height: 600px; }
	</style>
</head>

<div class="row" style="position: relative; width: 100%;">
	<div class="panel panel-default col-md-2">
		<div class="panel-heading" align="center">Artikel</div>
		<div id="menu-artikel" class="panel-body">

			<ul id="list-artikel">
		<?php 
  $qryberita="select * from berita";
$recberita=$con->query($qryberita);
while($databerita=$recberita->fetch_array()){
		?>
				<a href="?page=artikel&id=<?php echo $databerita['id_berita']; ?>"><li><?php echo $databerita['Judul']; ?></li></a>
		<?php } ?>
			</ul>

		</div>
	</div>

	<div class="panel panel-default col-md-9">
	<?php
	if(!isset($_GET['id']))
	{
		$dimana="Judul like '%a%'";
	}
	else
	{
		$dimana="id_berita='".$_GET['id']."'";	
	}
	

		$qryisi="select * from berita where $dimana";
		$recisi=$con->query($qryisi);
		$dataisi=$recisi->fetch_array();
	?>
		<div class="panel-body" >
			<h1><?php echo $dataisi['Judul']; ?></h1><hr>
			<div style="text-align: justify;">
			<?php 
				echo $dataisi['isi'];
			?>
			</div>
		</div>
	</div>
</div>
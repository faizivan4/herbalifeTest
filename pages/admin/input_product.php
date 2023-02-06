<head>
    <style type="text/css">
    .form-control{ margin-bottom: 5px; }
    </style>
</head>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="panel panel-primary">
            <div class="panel-heading">Input Produk        <button type="button" class="close fa fa-power-off" data-dismiss="modal"></button></div>
            <div class="panel-body">
                            <form method="post" action="" enctype="multipart/form-data">
                                <table width="100%">
                                    <tr><td>Kategori</td>
                                        <td>
                                            <select class="form-control" name="kat">
                                                <?php
                                            $sqlkat="select * from kategori";
                                            $reckat=$con->query($sqlkat);
                                            while ($data=$reckat->fetch_array()) {
                                            ?>
                                                <option value="<?php echo $data['id_kategori']; ?>"><?php echo $data['nama_kategori']; ?></option>
                                             <?php }?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr><td>Nama Produk</td><td><input type="text" class="form-control" name="namaproduct"/></td></tr>
                                    <tr><td>Deskripsi</td><td><input type="text" class="form-control" name="deskripsi"/></td></tr>
                                    <tr><td>Harga</td><td><input type="text" class="form-control" name="harga"/></td></tr>
                                    <tr><td>Gambar</td><td><input type="file" class="form-control" name="gambar"/></td></tr>

                                    <tr><td colspan="2" align="center"><input type="submit" class="btn btn-primary btn-sm"> <input type="reset" class="btn btn-danger btn-sm"></td></tr>

                                </table>
                            </form>
        </table>  
            </div>
        </div>
    </div>
</div>
<br>


                <div class="panel panel-primary">
                    <div class="panel-heading"><a class="btn btn-success btn-sm fadeInDownBig animated" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah Produk </a></div>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-responsive table-bordered" id="list-data">
                            <thead>
                                <th>Kategori</th>
                                <th>Nama Produk</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                                <th>Action</th>

                            </thead>

                            <tbody>
                            <?php
                                    $qryproduct='select * from product INNER JOIN kategori ON kategori.id_kategori=product.id_kategori';
                                    $recproduct=$con->query($qryproduct);
                                    while($dataproduct=$recproduct->fetch_array()){
                            ?>
                                    <tr>
                                    <td><?php echo $dataproduct['nama_kategori']; ?></td>
                                    <td><?php echo $dataproduct['nama_product']; ?></td>
                                    <td><?php echo $dataproduct['deskripsi']; ?></td>
                                    <td><?php echo $dataproduct['harga']; ?></td>
                                    <td width="100"><img width="120px" height="175px" class="img-rounded" src="<?php echo $dataproduct['gambar']; ?>"/></td>
                                    <td><a href="?pages=input_product&id=<?php echo $dataproduct['id_product']; ?>" class="btn btn-block  btn-danger btn-sm">Delete</a> <a href="?pages=edit_product&id=<?php echo $dataproduct['id_product']; ?>" class="btn btn-block  btn-success btn-sm">Edit</a></td>
                                    </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>   
                </div>

<?php
$namaproduct=$_POST['namaproduct'];
$namkat=$_POST['kat'];
$deskripsi=$_POST['deskripsi'];
$harga=$_POST['harga'];
$lokasi="product/";
$gambar=$_FILES['gambar']['tmp_name'];
$renproduct=$namaproduct.".".pathinfo($_FILES['gambar']['name'],PATHINFO_EXTENSION);
$simpanproduct=$lokasi.$renproduct;



if(isset($namaproduct))
{
    if(isset($gambar)) {
    move_uploaded_file($gambar, $simpanproduct);
    $qrysimpan="INSERT INTO product(nama_product,id_kategori, deskripsi, harga, gambar) VALUES ('$namaproduct','$namkat','$deskripsi','$harga','$simpanproduct')";
    $simpan=$con->query($qrysimpan);

    header('location:?pages=input_product');


    }
    else
    {
        echo "<script>alert('Isi semua data')</script>";
    }
}

if(isset($_GET['id']))
{
    $qrydel="DELETE FROM product WHERE id_product='".$_GET['id']."'";
    $del=$con->query($qrydel);
      header('location:?pages=input_product');
}
?>
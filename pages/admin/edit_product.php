<head>
    <style type="text/css">
    .form-control{ margin-bottom: 5px; }
    </style>
</head>

<?php

$qryproduct="select * from product where id_product='".$_GET['id']."'";
$recproduct=$con->query($qryproduct);
$dataproduct=$recproduct->fetch_array();

        ?>


        <div class="panel panel-primary">
            <div class="panel-heading">Input Produk        <button type="button" class="close fa fa-power-off" data-dismiss="modal"></button></div>
            <div class="panel-body">
                            <form method="post" action="" enctype="multipart/form-data">
                                <table width="100%">
<tr><td>Nama Product</td><td><input type='text' class='form-control' name='namaproduct' value='<?php echo $dataproduct['nama_product']; ?>'/></td></tr>
<tr><td>Deskripsi</td><td><input type='text' class='form-control' name='deskripsi' value='<?php echo $dataproduct['deskripsi']; ?>'/></td></tr>
<tr><td>Harga</td><td><input type='text' class='form-control' name='harga' value='<?php echo $dataproduct['harga']; ?>'/></td></tr>
<tr><td>Gambar</td><td><input type='file' class='form-control' name='gambar' /></td></tr>




                                    <tr><td colspan="2" align="center"><input type="submit" class="btn btn-primary btn-sm"> <input type="reset" class="btn btn-danger btn-sm"></td></tr>

                                </table>
                            </form>
        </table>  
            </div>
        </div>
<?php


$namaproduct=$_POST['namaproduct'];
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
    $qrysimpan="UPDATE product SET nama_product='$namaproduct', deskripsi='$deskripsi', harga='$harga', gambar='$simpanproduct' WHERE id_product='".$_GET['id']."'";
    $simpan=$con->query($qrysimpan);

    header('location:?pages=input_product');


    }
    else
    {
        $qrysimpan="UPDATE product SET nama_product='$namaproduct', deskripsi='$deskripsi', harga='$harga' WHERE id_product='".$_GET['id']."'";
        $simpan=$con->query($qrysimpan);

        header('location:?pages=input_product');
    }
}


?>
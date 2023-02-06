<?php 
ob_start();
error_reporting(E_ALL ^ E_NOTICE);
session_start();
include "koneksi.php";
    $user=$_SESSION['user'];
    $access=$_SESSION['access'];
$page=$_GET['page'];



$qryorder="select * from keranjang_belanja where username='$user'";
$roworder=$con->query($qryorder);
$dataorder=$roworder->fetch_array();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="shortcut icon" href="image/kms.jpg" />   
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Club Sehat Herbalife</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
	<link href="dist/css/one-page-wonder.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
.header-image img{
	position: relative;
	width: 100%;
}
.navbar-brand{ background-color: #10a321; color: #fff !important; height: 50px;}
.navbar-brand a:hover{ color: #fed528 !important;background-color: #00ffff; }
</style>
</head>

<body>

 <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="customer.php"><span id="logo">herbalife</span></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">Produk</a>
                        <ul class="dropdown-menu">
                            <?php 
                                                     $sqlkat="select * from kategori";
                            $reckat=$con->query($sqlkat);
                            while ($data=$reckat->fetch_array()) {
                            ?>
                            <li><a href="<?php echo $hal; ?>?page=product&idkat=<?php echo $data['id_kategori']; ?>"><?php echo $data['nama_kategori']; ?></a></li>
                             <?php }?>
                        </ul>
                    </li>
                    <li>
                        <a href="customer.php#tentang">Tentang</a>
                    </li>
                    <li>
                        <a href="customer.php#services">Pelayanan</a>
                    </li>
                    <li>
                        <a href="customer.php#contact">Hubungi Kami</a>
                    </li>
                    <li>
                        <a href="customer.php?page=artikel">Berita</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                                        <li id="login" class="dropdown"><a class="fa fa-user fa-1x dropdown-toggle" href="#" data-toggle="dropdown"> <?php echo $user; ?></a>

                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="?page=transaksi"><i class="fa fa-history fa-fw"></i> Riwayat Transaksi</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw "></i> Logout</a>
                        </li>
                    </ul>
                            
                      
                    
                    
                    </li>
                    <li>
                        <a href="customer.php?page=keranjang"><i class="fa fa-shopping-cart fa-fw fa-2x"> </i>( <?php echo $roworder->num_rows; ?> )</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Full Width Image Header -->
    <?php 
        if($page=="" || $page=="home")
        {
    ?>
    <header class="header-image">
		<img src="image/herballife-banner.jpg">    </header>
        <?php
    }
        ?>
    <!-- Page Content -->
    <div class="container">

       
        <?php
        
        if(!isset($page))
        {
            include "home.php";
        }
        else
        {
            if(file_exists("$page.php"))
            {
                include "$page.php";
            }
            else
            {
            include "home.php"; 
            }
        }
        
       ?>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    

<!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>


<script>
    $(document).ready(function() {
            
        
        $('#list-view').DataTable({
          responsive: true,
         "LengthChange": false,
        "sort": false,
        "info": false,
        "bPaginate": false,
        "bFilter": false,
        "bSearch": false,
        "language": {"emptyTable": "Tidak ada data"}
        
                                                    
        });
        
        $('#list-data').DataTable({
    
                 responsive: true,
                "sort": true,
                "info": true,
                "iDisplayLength": 10,
                "lengthChange": true,
                    
                "lengthMenu": [ [-1, 5, 10, 25, 50, 75,100], ["All", 5, 10, 25, 50, 75, 100] ],
                  "language": {
    "lengthMenu": "_MENU_ show",
    "info": "_START_ to _END_ ( Total data _MAX_ )",
    "search": "Search:",
    "emptyTable": "Data Empty",
    "zeroRecords": "Data Not found"
                            }
                                                        
        });
        
         $('#absen').DataTable({
    
                 responsive: true,
                "sort": true,
                "info": true,
                "iDisplayLength": -1,
                "lengthChange": true,
                    
                "lengthMenu": [ [-1, 5, 10, 25, 50, 75,100], ["Semua", 5, 10, 25, 50, 75, 100] ],
                  "language": {
    "lengthMenu": "_MENU_ data",
    "info": "_START_ sampai _END_ ( Total data _MAX_ )",
    "search": "Cari:",
    "emptyTable": "Sudah Absen semua",
    "zeroRecords": "Data tidak ditemukan"
                            }
                                                        
        });
        
    });
</script>
</body>
</html>
<?php
    $username=$_POST['user'];
$password=md5($_POST['pass']);

$sql="select * from user where username='$username' and password='$password'";
$logincheck=$con->query($sql);
$data=$logincheck->fetch_array();
$nama=$data['username'];
$access=$data['akses'];
if($username!="" && $password!="")
{
    if($logincheck->num_rows > 0)
    {

        $_SESSION['user']=$nama;
        $_SESSION['access']=$access;
        if($access=="customer")
        {
            echo "<script>window.location='customer.php'</script>";
        }
        else
        {
            echo "<script>window.location='dashboard.php'</script>";
        }

    }
    else
    {
        echo "<script>alert('Username atau Password  salah')</script>";
    }
}
?>

	

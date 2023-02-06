<?php 
error_reporting(E_ALL ^ E_NOTICE);
@session_start();
ob_start();
include "koneksi.php";
    $user=$_SESSION['user'];
    $access=$_SESSION['access'];

if($access=="customer")
{
header('location:customer.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

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
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style type="text/css">
    
    .modal-dialog {
    width: 100%;
    padding: 0;
    margin: 0;
}
#tambah{ margin-bottom: 10px; margin-top: 10px; }
#myModal{ margin-top: 20px; width: 60%; margin-left: 20%; }
#myModal .close{ font-size: 20px;color: #9b1511; }
#page-wrapper{ min-height: 760px; }
.dataTables_filter,.dataTables_paginate{ float: right; margin: 0; padding: 0; }
#list-data thead th{ text-align: center; }
</style>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">Herbalife</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                                <?php 

                                   if(file_exists("pages/$access/_nav.php"))
                                   {
                                   include "pages/$access/_nav.php";
                                   }
                                   else
                                   {
                                   echo "Menu for $access on going...";
                                   }
                                ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">


                    <?php
                        $pages=$_GET['pages'];
                        
                        if(isset($pages))
                        {
                            if(file_exists("pages/$access/$pages.php"))
                            {
                            include "pages/$access/$pages.php";
                            }
                            elseif($pages=="profile")
                            {
                            include "pages/umum/profile.php";
                            }
                            else
                            {
                            echo "<i><h1>The file still underconstruction<span class='fa fa-wrench'></span></h1></i></div>";
                            }

                        }
                        else
                        {
                        include "pages/$access/welcome.php";
                        }
                
                         
                    ?>


            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/dist/metisMenu.min.js"></script>
    
       <!-- DataTables JavaScript -->
    <script src="vendor/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/js/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <script src="dist/js/jquery.maskedinput.js"></script>
    <!-- Awesomeplete -->
    <script src="dist/js/awesomplete.js"></script>
    <script src="dist/js/awesomplete.min.js"></script>
    
    <script src="dist/css/jquery.datetimepicker.full.js"></script>




        <script src="ckeditor/ckeditor.js"></script>
    <script src="ckeditor/editor.js"></script>
    
    <script>
    initSample();
</script>
    
    <script>
    jQuery(function($){
   $("#npwp").mask("99.999.999.9-999.999",{placeholder:"xx.xxx.xxx.x-xxx.xxx"});
   $("#phone").mask("(999) 9999-9999");
   $("#hp").mask("9999-9999-9999");

});
    
    
    
  $(function() {

    $("#tgl").datepicker({
      dateFormat: "yy-mm-dd", 
      showButtonPanel: true,
      changeMonth: true,
      changeYear: true
    });
    
     $("#tglend").datepicker({
      dateFormat: "yy-mm-dd", 
      showButtonPanel: true,
      changeMonth: true,
      changeYear: true
    });
    
    $(".tgl").datepicker({
      dateFormat: "yy-mm-dd", 
      showButtonPanel: true,
      changeMonth: true,
      changeYear: true
    });
    

    
  });
  </script>
  

  
      <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
            
        
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
        
        
    });
    </script>
    
    <script>
    $(document).ready(function() {
        $('.dataTables').DataTable({
                responsive: true,
                "sort": true,
                "info": true,
                "iDisplayLength": 10,
                "lengthChange": true,
                    
                "lengthMenu": [ [-1, 5, 10, 25, 50, 75,100], ["Semua", 5, 10, 25, 50, 75, 100] ],
                  "language": {
    "lengthMenu": "_MENU_ data",
    "info": "_START_ sampai _END_ ( Total data _MAX_ )",
    "search": "Cari:",
    "emptyTable": "Tidak ada data",
    "zeroRecords": "Data tidak ditemukan"
                            }
        });
    });
    </script>

<script>/*
window.onerror = function(errorMsg) {
    $('#console').html($('#console').html()+'<br>'+errorMsg)
}*/

$.datetimepicker.setLocale('id');
$('.some_class').datetimepicker();


jQuery('#timepicker').datetimepicker({
  datepicker:false,
  format:'H:i',
  mask:true
});

    $('.menu-tooltip').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })

</script>

<script type="text/javascript">
    
    function send_data(formObj, url, responseDIV)
{
    var image_load = "<div class='overlay'> <i class='fa fa-refresh fa-spin'></i> Wait....</div>";
    $.ajax({
        url: url,
        beforeSend: function(){
            $(responseDIV).html(image_load);
        }, 
        data: $(formObj).serialize(), 
        type: "post", 
        dataType: "html", 
        success: function(response){
            $(responseDIV).html(response);
            $(formObj)[0].reset();
        },
        error: function(){
            alert("Something Wrong!");
        },
    });
    return false;
}

    function calldata(formObj, url, responseDIV)
{
    var image_load = "<div class='overlay'> <i class='fa fa-refresh fa-spin'></i> Wait....</div>";
    $.ajax({
        url: url,
        beforeSend: function(){
            $(responseDIV).html(image_load);
        }, 
        data: $(formObj).serialize(), 
        type: "post", 
        dataType: "html", 
        success: function(response){
            $(responseDIV).html(response);
        },
        error: function(){
            alert("Something Wrong!");
        },
    });
    return false;
}





</script>
</body>

</html>

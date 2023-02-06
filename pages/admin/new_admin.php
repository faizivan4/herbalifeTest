<head>
<style>
.modal-dialog {
    width: 100%;
    padding: 0;
    margin: 0;
}
#tambah{ margin-bottom: 10px; margin-top: 10px; }
#myModal{ margin-top: 20px; width: 60%; margin-left: 20%; }
#myModal .close{ font-size: 20px;color: #9b1511; }
.col-lg-8{padding:0; }
.dataTables_filter{ width: 100% !important ; }
</style>
</head>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="panel panel-primary">
            <div class="panel-heading">Admin Baru        
              <button type="button" class="close fa fa-power-off" data-dismiss="modal"></button></div>
            <div class="panel-body">
                             <table width="100%">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Password Confirmation</th>
                                    <th>Level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <form method="post" action="">
                            <tbody>
                                <tr>
                                    <td height="26"><input type="text" class="form-control" name="username"></td>
                                  <td><input type="password" class="form-control" name="password"></td>
                                    <td><input type="password" class="form-control" name="passconf"></td>
                                    <td>
                                        <select class="form-control" name="level">
                                            <option></option>
                                            <option value="admin">Admin</option>
                                            <option value="headarea">Head Area</option>
                                        </select>
                                    </td>
                                    <td><input type="submit" class="btn btn-primary btn-sm" value="Submit"></td>
                                </tr>
                            </tbody>
                            </form>
        </table>  
            </div>
        </div>
    </div>
</div>


                <div class="panel panel-primary col-lg-8 col-lg-offset-2">
                    <div class="panel-heading"><a class="btn btn-success btn-sm fadeInDownBig animated" data-toggle="modal" data-target="#myModal" id="tambah"><span class="fa fa-plus"></span>   Tambah   </a> Daftar Admin</div>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-responsive table-bordered" id="list-data">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Akses Level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php 
                                $sqladmin="select * from user where akses='admin'";
                                $rowadmin=$con->query($sqladmin);
                                while($dataadmin=$rowadmin->fetch_array()){$no +=1;                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $dataadmin['username']; ?></td>
                                    <td><?php echo $dataadmin['akses']; ?></td>
                                    <td><a href="?pages=new_admin&id=<?php echo $dataadmin['username'];?>&del=1" class="btn btn-danger btn-sm btn-block">Hapus</a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>   
                </div>
<?php
$username=$_POST['username'];
$pass=MD5($_POST['password']);
$passconf=md5($_POST['passconf']);
$level=$_POST['level'];


if($username!="")
{
    if($pass==$passconf)
    {
        $simpan=$con->query("INSERT INTO user (username,password,akses) VALUES ('$username','$pass','$level')");
        header('location:?pages=new_admin');
    }
    else
    {
        echo "<script type='text/javascript'>alert('Konfirmasi Password Tidak Valid')</script>";
    }
}


if(isset($_GET['del']))
{
    $delete=$con->query("DELETE FROM user where username='".$_GET['id']."'");
    header('location:?pages=new_admin');
}
?>
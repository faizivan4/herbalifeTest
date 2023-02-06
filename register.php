<head>

<style>
	.col-lg-8{ padding:0;}
	#frm-register .form-control{ margin-bottom:10px;}
	.panel-primary{ margin-top:20px;}
</style>


</head>
<div class="row">

    <div class="panel panel-primary col-lg-8 col-lg-offset-2">
        <div class="panel-heading">REGISTRASI PELANGGAN</div>
        <div class="panel-body">
        	<form action="" method="post">
				<label>Username</label><input id="user" type='email' class='form-control' name='username' placeholder=" email" required/>
                <label>Password</label><input id="password" type='password' class='form-control' name='password' required/>Konfirmasi password
                <label></label><input id="passconf" type='password' class='form-control' name='passconf' required/>
                <label>Nama lengkap</label><input type='text' class='form-control' name='customername' required/>
                <label>Negara</label><input type='text' class='form-control' name='customercountry' required/>
                <label>Alamat</label><textarea rows="3" class='form-control' name='customeraddress'></textarea>
                <label>No Handphone</label><input type='number' class='form-control' name='customerphone'/>
					<input type="submit" class="btn btn-primary" value="Submit" > <a href="index.php" class="btn btn-danger">Back</a>
			</form>
        </div>
    	<div class="panel-footer"><div id="result"></div></div>
    </div>
    
</div>


</script>
<?php

$customername=$_POST['customername'];
$customercountry=$_POST['customercountry'];
$customeraddress=$_POST['customeraddress'];
$customerphone=$_POST['customerphone'];

$username=$_POST['username'];
$password=md5($_POST['password']);
$passconf=md5($_POST['passconf']);

$pass=$_POST['password'];
$conf=$_POST['passconf'];


$sqlinsertcust="INSERT INTO `customer`(`customer_name`, `customer_country`, `customer_address`, `customer_phone`,`username`) VALUES ('$customername','$customercountry','$customeraddress','$customerphone','$username')";

$sqlinsertuser="INSERT INTO `user`(`username`, `password`, `akses`) VALUES ('$username','$password','customer')";

if($username!="")
{
    if($pass!="" AND $username!="" AND $conf!="" AND $customername!="")
    {
            
            if($password==$passconf)
            {
                $insertcust=$con->query($sqlinsertcust);
                $insertuser=$con->query($sqlinsertuser);
            }
            else
            {

                echo "<script>alert('Password Confirmation tidak sesuai')</script>";
            }
    }
    else
    {
        
        echo "<script>alert('Isi semua data')</script>";
    }
}
        
?>
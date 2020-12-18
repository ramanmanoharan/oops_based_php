<?php require_once('../config/function.php');
$check = new Ogbs();

if(isset($_SESSION['admin_login'])){
    redirect('index');
}

?>
   

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login to OGBS Admin Pannel</title>
    <link rel="stylesheet" href="../style/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<style>
    .login{
    box-shadow: 10px 10px 20px 20px rgba(0, 0, 0, 0.65);
    }
    </style>
<body >
  
    <div class="container-fluid " style="background-image:url(../image/bbg.jpg);">
       <div class="row">
        <div class="col-lg-4 mx-auto login" style="height:625px ;">
        
         <?php
    if(isset($_POST['login'])):
    $username= $_POST['username'];
    $password = $_POST['password'];
    
    $query = $check->getData("SELECT * FROM admin WHERE email='$username' AND password='$password'");
    foreach($query as $row);
    $admin_id = $row['admin_id'];
    
    if($admin_id > 0):
           $_SESSION['admin_login'] = $admin_id;
           redirect('index');
       
?>
        
        
         <?php else:  ?><div class="alert alert-danger">User name and password is incorrect</div><?php endif; endif; ?>
            <blockquote class="text-center mt-5 display-4 text-light">Admin Log In </blockquote>
            <div class="card border-0 p-5" style="background-color:rgba(255, 255, 255, 0);">
                <form action="" id="login" method="post">
                    <div class="form-group">
                        <label for="username" class="text-muted p">Email</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-danger text-light" id="inputGroup-sizing-default"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" id="username" name="username" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="example@gmail.com">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="text-muted p">Password </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-danger text-light" id="inputGroup-sizing-default"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" id="password" name="password" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="enter password">
                        </div>
                        <p class="form-text small float-right"><a href="" class="text-danger" style="text-decoration:none;">forgot password..?</a></p>

                    </div>
                    <input type="submit" class="btn btn-success btn-block " value="Log In" name="login">
                </form>
            </div>
        </div>
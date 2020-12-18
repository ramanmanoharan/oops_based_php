<?php require_once('../config/function.php');
$check = new Ogbs();
if(isset($_SESSION['user_login'])){
    redirect('index');
}
?>
   

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login to OGBS User Pannel</title>
    <link rel="stylesheet" href="../style/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<style>
    .login{
    box-shadow: 10px 10px 10px  rgba(0, 0, 0, 0.77);
    }
    </style>
<body >
  
    <div class="container-fluid " style="background-image:url(../image/bbg.jpg);">
       <div class="row">
        <div class="col-lg-4   login" style="height:625px ;">
        
         <?php
    if(isset($_POST['login'])):
    $username= $_POST['username'];
    $password = $_POST['password'];
    
    $query = $check->getData("SELECT * FROM user WHERE email='$username' AND password='$password'");
    echo "SELECT * FROM user WHERE email='$username' AND password='$password'";
    foreach($query as $row);
    $user_id = $row['user_id'];
    
    if($user_id > 0):
           $_SESSION['user_login'] = $user_id;
           redirect('index');
       
?>
        
        
         <?php else:  ?><div class="alert alert-danger">User name and password is incorrect</div><?php endif; endif; ?>
            <blockquote class="text-center mt-5 display-4 text-light">Log In Here</blockquote>
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
        <div class="col-lg-8 p-0" >
           <?php if(isset($_POST['signup'])): 
            $name = $_POST['f_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            
            $insert= $check->insertData("INSERT INTO user(f_name, email, password, mobile) value('$name','$email','$password','$phone')");
            if($insert){ ?>
              <div class="alert alert-success">User Successfully Registered <strong><a href="#username" class="text-info">click here </a></strong> to login.</div>  
           <?php }else{?>
           <div class="alert alert-danger">something went wrong</div>
           <?php }
            endif;?>
            <div class="card border-0 p-3 mt-2 col-lg-6  mx-auto  " style="background-color:rgba(255, 255, 255, 0);">
               <h1  class="display-4 text-center mb-2 text-light">Sign Up Here</h1>
                <form action=""  class="mt-3" method="post">
                    <div class="form-group">
                        <label for="fullname" class="text-light">Full name</label>
                        <input type="text" name="f_name" id="fullname" class="form-control" placeholder="full name">
                    </div>
                <div class="form-group">
                        <label for="email" class="text-light">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="example@gmail.com">
                    </div>
                <div class="form-group">
                        <label for="phone" class="text-light">Phone</label>
                        <input type="tel" name="phone" id="phone" class="form-control" placeholder="enter phone">
                    </div>
                <div class="form-group">
                        <label for="password" class="text-light">Password </label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="password must be 6 character or more">
                    </div>
                    <input type="submit" class="btn btn-info btn-block" value="Register" name="signup">
                    
                    <p class="form-text text-light mt-3 float-right">Already have an account? <a href="#username" class="text-success"><strong>Log In</strong></a></p>
                </form>
            </div>
        </div>
        </div></div>
</body>

</html>

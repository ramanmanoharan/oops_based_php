<?php 
$u = new Ogbs();
$id= $_SESSION['user_login']; 

$call = $u->getData("SELECT * FROM user WHERE user_id = '$id'");


foreach($call as $abcd); 
     
    
?>  

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>OGBS || User Pannel</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="http://localhost/ogbs/style/bootstrap.css" >
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="http://localhost/ogbs/style/sidebar_style.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
 <nav id="sidebar" style="background-image:url(../image/bbg.jpg); background-size:cover;">
           <div class="sidebar_bg_image" style="background-color:rgba(0, 0, 0, 0);">
            <div class="sidebar-header " style="background-color:rgba(0, 0, 0, 0); border-bottom:1px solid rgba(136, 136, 136, 0.55); height:180px;" >
                 <div class="profile_photo bg-dark mx-auto " style="height:60px; width:60px; border-radius:50%;"><img src="http://localhost/ogbs/user/images/<?= $abcd['p_image']; ?>" class="img-fluid img-responsive" style="border-radius:50%;" alt=""></div>
                 <h3 class="text-center font-weight-light h5 mt-2 text-capitalize">Hello! <?= $abcd['f_name']; ?></h3>
              
                <table class="table " style="">
                    <tr >
                        <td class="border-0 text-warning text-center " title="Profile"><a href="http://localhost/ogbs/user/profile.php"><i class="fas fa-user "></i></a></td>
                        <td class="border-0  text-center text-info" title="Setting"><a href="http://localhost/ogbs/user/setting.php"><i class="fas fa-cogs"></i></a></td>
                        <td class="border-0 text-warning text-center text-danger" title="Logout"><a href="http://localhost/ogbs/user/logout.php"><i class="fas fa-power-off"></i></a></td>
                    </tr>
                </table>
               </div>

            <ul class="list-unstyled components border-0">
               
                <li class="">
                    <a href="index.php" ><i class="fas fa-tachometer-alt mr-2"></i> Dashboard</a>
                    
                </li>
             
                <li>
                    <a href="#connection" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-clipboard mr-2" ></i> Connection</a>
                    <ul class="collapse list-unstyled" id="connection">
                        <li>
                            <a href="http://localhost/ogbs/user/new_connection.php" class=""><i class="fas fa-clipboard-list mr-2"></i> New Connection</a>
                        </li>
                        <li>
                            <a href="http://localhost/ogbs/user/connection_list.php"><i class="fas fa-calendar-alt mr-2"></i> Connection Details</a>
                        </li>
                       
                    </ul>
                </li>

                 <li>
                    <a href="http://localhost/ogbs/user/book_cyc.php" ><i class="fas fa-tasks mr-2"></i> Book cylinder</a>
                    
                </li> 
                   
                   <li>
                    <a href="http://localhost/ogbs/user/booking_history.php" ><i class="fas fa-tasks mr-2"></i> Booking History</a>
                    
                </li>
                <li>
                    <a href="#reports" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-clipboard mr-2" ></i>  Reports</a>
                    <ul class="collapse list-unstyled" id="reports">
                        <li>
                            <a href="#" class=""><i class="fas fa-clipboard-list mr-2"></i> All Reports</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-calendar-alt mr-2"></i> Date Rise Reports</a>
                        </li>
                       
                    </ul>
                </li>
                
              <!--   <li>
                    <a href="#"><i class="fas fa-comments mr-2"></i> User Feedback</a>
                </li>
            <li>
                    <a href="#"><i class="fas fa-address-card mr-2"></i> Contact Us</a>
                </li> -->
            </ul>

           <!-- <ul class="list-unstyled CTAs">
                <li>
                    <a href="#" class="download">User feedback</a>
                </li>
                <li>
                    <a href="#" class="btn btn-danger">Logout</a>
                </li>
            </ul>  -->
            </div>
        </nav>


        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-whtie p-2">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-light">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
                    
                    <a href="" class="navbar-brand ml-4">Online Gas Booking System</a>

                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        
                    </div>
                </div>
            </nav>
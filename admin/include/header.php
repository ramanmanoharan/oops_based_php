<?php 
$sidebar= new Ogbs();

$a_id=$_SESSION['admin_login'];
$call = $sidebar->getData("SELECT * FROM admin WHERE admin_id = '$a_id'");
foreach($call as $row);
                            
?>  

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>ONLINE GAS BOOKING SYSTEM BY REDBACK | Admin Pannel</title>

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
 <nav id="sidebar" style="background-image:url(image/bg1.jpg); background-size:cover;">
           <div class="sidebar_bg_image h-auto pb-5" style="background:rgba(0, 0, 0, 0.33);">
            <div class="sidebar-header " style="background-color:rgba(0, 0, 0, 0); border-bottom:1px solid rgba(136, 136, 136, 0.55); height:180px;" >
                 <div class="profile_photo bg-danger mx-auto " style="height:60px; width:60px; border-radius:50%;"><img src="http://localhost/ogbs/admin/image/<?= $row['profile_image']; ?>" class="img-fluid" style="border-radius:50%; height:60px; width:60px;" alt=""></div>
                 <h3 class="text-center font-weight-light h5 mt-2">Hello! <?= $row['admin_name']; ?></h3>
              
                <table class="table " style="">
                    <tr >
                        <td class="border-0 text-warning text-center " title="Profile"><a href="http://localhost/ogbs/admin/profile.php"><i class="fas fa-user "></i></a></td>
                        <td class="border-0  text-center text-info" title="Setting"><a href="http://localhost/ogbs/admin/setting.php"><i class="fas fa-cogs"></i></a></td>
                        <td class="border-0 text-warning text-center text-danger" title="Logout"><a href="http://localhost/ogbs/admin/logout.php"><i class="fas fa-power-off"></i></a></td>
                    </tr>
                </table>
               </div>

            <ul class="list-unstyled components border-0">
               
                <li class="">
                    <a href="index.php" ><i class="fas fa-tachometer-alt mr-2"></i> Dashboard</a>
                    
                </li>
             
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-table mr-2"></i> Delivery Staff</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="http://localhost/ogbs/admin/add_staff.php" class=""><i class="fas fa-plus mr-2"></i>Add staff</a>
                        </li>
                        <li>
                            <a href="http://localhost/ogbs/admin/manage_staff.php"><i class="fas fa-tasks mr-2"></i> Manage staff</a>
                        </li>
                       
                    </ul>
                </li>
                <li>
                    <a href="http://localhost/ogbs/admin/reg_users.php"><i class="fas fa-plus mr-2"></i> Reg Users</a>
                </li>
                 <li>
                    <a href="#managevehicle" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-tasks mr-2"></i> Connection </a>
                    <ul class="collapse list-unstyled" id="managevehicle">
                        <li>
                            <a href="http://localhost/ogbs/admin/new_connection.php" class=""><i class="fas fa-sign-in-alt mr-2"></i> New Connection</a>
                        </li>
                        <li>
                            <a href="http://localhost/ogbs/admin/onhold_connection.php"><i class="fas fa-sign-out-alt mr-2"></i> Onhold Connection</a>
                        </li>
                           <li>
                            <a href="http://localhost/ogbs/admin/approved_connection.php"><i class="fas fa-check-circle mr-2"></i>Approved Connection</a>
                        </li>
                           <li>
                            <a href="http://localhost/ogbs/admin/rejected_connection.php"><i class="fas fa-sign-out-alt mr-2"></i> Rejected Connection</a>
                        </li>
                       
                    </ul>
                </li>
                <li>
                    <a href="#booking" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-clipboard mr-2" ></i> Booking</a>
                    <ul class="collapse list-unstyled" id="booking">
                        <li>
                            <a href="http://localhost/ogbs/admin/new_booking.php." class=""><i class="fas fa-clipboard-list mr-2"></i> New Booking</a>
                        </li>
                        <li>
                            <a href="http://localhost/ogbs/admin/confirmed_booking.php."><i class="fas fa-calendar-alt mr-2"></i> Confirmed Booking</a>
                        </li><li>
                            <a href="http://localhost/ogbs/admin/cancelled_booking.php."><i class="fas fa-calendar-alt mr-2"></i> Cancelled Booking</a>
                        </li>
                       
                    </ul>
                </li>
                   
                   <li>
                    <a href="#assignbooking" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-clipboard mr-2" ></i> Assign Booking</a>
                    <ul class="collapse list-unstyled" id="assignbooking">
                        <li>
                            <a href="http://localhost/ogbs/admin/new_assign_booking.php" class=""><i class="fas fa-clipboard-list mr-2"></i> New assign Booking</a>
                        </li>
                        <li>
                            <a href="http://localhost/ogbs/admin/on_the_way.php"><i class="fas fa-calendar-alt mr-2"></i> On the Way</a>
                        </li><li>
                            <a href="http://localhost/ogbs/admin/delivered.php"><i class="fas fa-calendar-alt mr-2"></i> Delivered </a>
                        </li>
                       
                    </ul>
                </li>
                <li>
                    <a href="#reports" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-clipboard mr-2" ></i> Reports</a>
                    <ul class="collapse list-unstyled" id="reports">
                        <li>
                            <a href="http://localhost/ogbs/admin/all_report.php" class=""><i class="fas fa-clipboard-list mr-2"></i> All Reports</a>
                        </li>
                        <li>
                            <a href="http://localhost/ogbs/admin/date_wise_report.php"><i class="fas fa-calendar-alt mr-2"></i> Date Rise Reports</a>
                        </li>
                       
                    </ul>
                </li>
                <li>
                    <a href="http://localhost/ogbs/admin/search.php"><i class="fas fa-search mr-2"></i> Search </a>
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
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                            <div class="dropleft" >
                            <a href="" class="na-link text-info " id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bell " ></i>
                      
      
                            <div class="badge badge-danger p-1 badge-pill" style="height:5px; width:5px;">.</div> </a>
                            <div class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton" style="width:500px;">
                            <div class="card">
                                <div class="card-header">Notifications</div>
                                <div class="card-body p-0">
            <?php
       $new_booking = $sidebar->getData("SELECT * FROM booked WHERE  status='' AND DATE(booking_time) = DATE(NOW()) ");
    foreach($new_booking as $nn):
      if($nn['booking_no']+=""): 
                                    
                                    
                                    ?>
  <a href="http://localhost/ogbs/admin/new_booking.php"> <div class="alert alert-secondary rounded-0 mt-3 container">
   <div class="row">
       <div class="container col-2 " ><i class="fas fa-check-circle fa-5x"></i></div> <div class="container col"><strong><?= $nn['c_name']; ?></strong><br>New booking request no.<?= $nn['booking_no']; ?></div>
   </div>
   </div></a>
    <?php   else: ?><div class="container p-4"><p>No new Notifications</p></div>
                                    
                    <?php endif; endforeach; ?>
                                </div>
                                <div class="card-footer"><small>view all booking records</small></div>
                            </div>
    
    
  </div>
</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            

  
  
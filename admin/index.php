<?php 

require('../config/function.php');
$index = new Ogbs();
if(!isset($_SESSION['admin_login'])){
    redirect('login');
}
$new_connection = $index->getData("SELECT * FROM connection WHERE status=''");
$approved = $index->getData("SELECT * FROM connection WHERE status='1'");
$onhold = $index->getData("SELECT * FROM connection WHERE status='0'");
$rejected = $index->getData("SELECT * FROM connection WHERE status='2'");
$new_booking = $index->getData("SELECT * FROM booked WHERE  status=''");
$confirmed = $index->getData("SELECT * FROM booked WHERE status='0'");
$cancelled = $index->getData("SELECT * FROM booked WHERE status='1'");
$new_assign = $index->getData("SELECT * FROM booked WHERE status='0' AND status_1=''");
$delivered = $index->getData("SELECT * FROM booked WHERE status_2='1'");
$staff= $index->getData("SELECT * FROM staff");
$user =$index->getData("SELECT * FROM user");


require_once('include/header.php'); 



?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
            <div class="card shadow border-0 ">
                <div class="header col-lg-10 col-sm-10 col-xs-8 mx-auto p-2 rounded text-light shadow bg-info " style="margin-top:-10px; height:40px;">total new connection</div>
                <h5></h5><div class="card-body p-0 pb-2">
                <p class="ml-3"><?= count($new_connection); ?> <small class="h6 font-weight-light ml-4">new connection</small ></p>
                
                   <hr>
                    <a href="new_connection.php"  class="ml-3 text-info">view Details</a>
                </div>
            </div>
        </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
            <div class="card shadow border-0 ">
                <div class="header col-lg-11 col-sm-10 col-xs-8 mx-auto p-2 rounded text-light shadow bg-success " style="margin-top:-10px; height:40px;">Approved connection</div>
                <h5></h5><div class="card-body p-0 pb-2">
                <p class="ml-3"><?= count($approved); ?> <small class="h6 font-weight-light ml-4"> approved  connection</small ></p>
                
                   <hr>
                    <a href="approved_connection.php"  class="ml-3 text-info">view Details</a>
                </div>
            </div>
        </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
            <div class="card shadow border-0 ">
                <div class="header col-lg-10 col-sm-10 col-xs-8 mx-auto p-2 rounded text-light shadow bg-warning " style="margin-top:-10px; height:40px;">Onhold connection</div>
                <h5></h5><div class="card-body p-0 pb-2">
                <p class="ml-3"><?= count($onhold); ?> <small class="h6 font-weight-light ml-4">Onhold connection</small ></p>
                
                   <hr>
                    <a href="onhold_connection.php"  class="ml-3 text-info">view Details</a>
                </div>
            </div>
        </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
            <div class="card shadow border-0 ">
                <div class="header col-lg-10 col-sm-10 col-xs-8 mx-auto p-2 rounded text-light shadow bg-danger " style="margin-top:-10px; height:40px;">total Reject connection</div>
                <h5></h5><div class="card-body p-0 pb-2">
                <p class="ml-3"><?= count($rejected); ?><small class="h6 font-weight-light ml-4">Rejected connection</small ></p>
                
                   <hr>
                    <a href="Rejected_connection.php"  class="ml-3 text-info">view Details</a>
                </div>
            </div>
        </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
            <div class="card shadow border-0 ">
                <div class="header col-lg-10 col-sm-10 col-xs-8 mx-auto p-2 rounded text-light shadow bg-info " style="margin-top:-10px; height:40px;">New Booking</div>
                <h5></h5><div class="card-body p-0 pb-2">
                <p class="ml-3"><?= count($new_booking); ?> <small class="h6 font-weight-light ml-4">new booking</small ></p>
                
                   <hr>
                    <a href="new_booking.php"  class="ml-3 text-info">view Details</a>
                </div>
            </div>
        </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
            <div class="card shadow border-0 ">
                <div class="header col-lg-10 col-sm-10 col-xs-8 mx-auto p-2 rounded text-light shadow bg-success " style="margin-top:-10px; height:40px;">Confirmed Booking</div>
                <h5></h5><div class="card-body p-0 pb-2">
                <p class="ml-3"><?= count($confirmed); ?> <small class="h6 font-weight-light ml-4">Confirmed Booking</small ></p>
                
                   <hr>
                    <a href="confirmed_booking.php"  class="ml-3 text-info">view Details</a>
                </div>
            </div>
        </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
            <div class="card shadow border-0 ">
                <div class="header col-lg-10 col-sm-10 col-xs-8 mx-auto p-2 rounded text-light shadow bg-warning " style="margin-top:-10px; height:40px;">Cancelled Booking</div>
                <h5></h5><div class="card-body p-0 pb-2">
                <p class="ml-3"><?= count($cancelled); ?> <small class="h6 font-weight-light ml-4">Cancelled Booking</small ></p>
                
                   <hr>
                    <a href="cancelled_booking.php"  class="ml-3 text-info">view Details</a>
                </div>
            </div>
        </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
            <div class="card shadow border-0 ">
                <div class="header col-lg-10 col-sm-10 col-xs-8 mx-auto p-2 rounded text-light shadow bg-secondary " style="margin-top:-10px; height:40px;">Assign Booking</div>
                <h5></h5><div class="card-body p-0 pb-2">
                <p class="ml-3"><?= count($new_assign); ?> <small class="h6 font-weight-light ml-4">New Assign Booking</small ></p>
                
                   <hr>
                    <a href="new_assign_booking.php"  class="ml-3 text-info">view Details</a>
                </div>
            </div>
        </div>
    
    <div class="col-lg-4 col-md-3 col-sm-6 mb-5">
            <div class="card shadow border-0 ">
                <div class="header col-lg-10 col-sm-10 col-xs-8 mx-auto p-2 rounded text-light shadow bg-info " style="margin-top:-10px; height:40px;">Total Delivered Cylinder</div>
                <h5></h5><div class="card-body p-0 pb-2">
                <p class="ml-3"><?= count($delivered); ?> <small class="h6 font-weight-light ml-4">Delivered Cylinder</small ></p>
                
                   <hr>
                    <a href="delivered.php"  class="ml-3 text-info">view Details</a>
                </div>
            </div>
        </div>
    
    <div class="col-lg-4 col-md-3 col-sm-6 mb-5">
            <div class="card shadow border-0 ">
                <div class="header col-lg-10 col-sm-10 col-xs-8 mx-auto p-2 rounded text-light shadow bg-info " style="margin-top:-10px; height:40px;">Total Staff</div>
                <h5></h5><div class="card-body p-0 pb-2">
                <p class="ml-3"><?= count($staff); ?> <small class="h6 font-weight-light ml-4">Staff</small ></p>
                
                   <hr>
                    <a href=manage_staff.php""  class="ml-3 text-info">view Details</a>
                </div>
            </div>
        </div>
    
    <div class="col-lg-4 col-md-3 col-sm-6 mb-5">
            <div class="card shadow border-0 ">
                <div class="header col-lg-10 col-sm-10 col-xs-8 mx-auto p-2 rounded text-light shadow bg-info " style="margin-top:-10px; height:40px;">Total Users </div>
                <h5></h5><div class="card-body p-0 pb-2">
                <p class="ml-3"><?= count($user); ?> <small class="h6 font-weight-light ml-4">Regestered Users</small ></p>
                
                   <hr>
                    <a href="reg_users.php"  class="ml-3 text-info">view Details</a>
                </div>
            </div>
        </div>
    
    </div>

   
    
</div>



<?php require_once('include/footer.php'); ?>
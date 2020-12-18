<?php require_once('../config/function.php');
$view = new Ogbs();
if(!isset($_SESSION['user_login'])){
    redirect('login');
}
include('include/header.php');

$booking_no = $_GET['booking_no'];
$call= $view->getData("SELECT * FROM booked WHERE booking_no = '$booking_no'");
foreach($call as $row);
?>

<div class="container">
    <div class="card border-0 shadow">
       <div class="header col-lg-5 ml-5 bg-dark text-light p-3 rounded shadow" style="margin-top:-30px;">Booking Details</div>
        <table class="table table-bordered mt-5">
            <tr>
                <th colspan="4">Booking Number : <small class="h6 ml-3 text-muted"><?= $row['booking_no']; ?></small></th>
            </tr>
            <tr>
                <th colspan="2">Consumer No : <small class="h6 ml-3 text-danger"><?php $join= $view->getData("SELECT * FROM booked JOIN connection ON booked.user_id=connection.user_id"); foreach($join as $value); $c_id= $value['connection_id']; echo "$c_id" ; ?></small></th>
                <th colspan="2">Refill Size: <small class="h6 ml-3 text-info"><?= $row['refill_size']; ?>.2 Kg</small></th>
            </tr>
            <tr>
                <th>Consumer Name</th>
                <td><?= $row['c_name']; ?></td>
                <th>Consumer Phone no</th>
                <td><?= $row['c_phone']; ?></td>
            </tr>
            <tr>
                <th>Consumer Email</th>
                <td><?= $row['c_email']; ?></td>
                <th>Shipping Address</th>
                <td><?= $row['c_address']; ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?php
                    if($row['status_1']!=""):?><span class="badge badge-success badge-pill p-2">Delivered</span><?php 
                    elseif($row['status'] == ""): ?>
                    <span class="badge badge-danger badge-pill p-2">Pending</span><?php elseif($row['status']=="0"): ?>
                    <span class="badge badge-info badge-pill p-2">Confirmed</span><?php elseif($row['status']=="1"):?><span class="badge badge-danger badge-pill p-2">Cancelled</span><?php else:  ?><?php endif; ?>
                </td>
                <th>Booking Date</th>
                <td><?= $row['booking_time']; ?></td>
            </tr>
        </table>
        <?php if($row['status']=="0" || $row['status']=="1"): ?>
            <table class="table table-bordered">
                <tr>
                    <th colspan="6">Response History</th>
                </tr>
                <tr>
                    <th>#</th>
                    <th>Delivery Boy</th>
                    <th>Refilling cost</th>
                    <th>Remark</th>
                    <th>Status</th>
                    <th>Response Time</th>
                </tr>
                
                <tr>
                    <td>1</td>
                    <td><?php $staff= $view->getData("SELECT * from staff JOIN booked ON staff.staff_id=booked.assign_to ");
                foreach($staff as $xyz);
                echo $xyz['s_name']; ?></td>
                    <td><?= $row['refill_cost']; ?></td>
                    <td><?= $row['remark']; ?></td>
                    <td>
                    <?php if($row['status']=="1"): ?>
                    <span class="badge badge-danger badge-pill p-2">cancelled</span><?php else: ?>
                    <span class="badge badge-info badge-pill p-2">confirmed</span>
                    <?php endif; ?>
                    </td>
                    <td><?= $row['response_time']; ?></td>
                </tr>
                <?php if($row['status_1']==""): else: ?>
                <tr>
                    <td>2</td>
                    <td><?php $staff= $view->getData("SELECT * from staff JOIN booked ON staff.staff_id=booked.assign_to ");
                foreach($staff as $xyz);
                echo $xyz['s_name']; ?></td>
                    <td><?= $row['refill_cost']; ?></td>
                    <td><?= $row['remark_1']; ?></td>
                    <td><span class="badge badge-secondary badge-pill p-2">On the way</span></td>
                    <td><?= $row['response_time_1']; ?></td>
                </tr>
                <?php endif; if($row['status_2']==""): else: ?>
                <tr>
                    <td>3</td>
                    <td><?php $staff= $view->getData("SELECT * from staff JOIN booked ON staff.staff_id=booked.assign_to ");
                foreach($staff as $xyz);
                echo $xyz['s_name']; ?></td>
                    <td><?= $row['refill_cost']; ?></td>
                    <td><?= $row['remark_2']; ?></td>
                    <td><span class="badge badge-success badge-pill p-2">Delivered</span></td>
                    <td><?= $row['response_time_2']; ?></td>
                </tr> <?php endif; ?>
            </table>
            <?php else: endif; ?>
    </div>
</div>








<?php
include('include/footer.php');?>
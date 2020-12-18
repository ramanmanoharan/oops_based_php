<?php require('../config/function.php');
$book_details = new Ogbs();
if(!isset($_SESSION['admin_login'])){
    redirect('login');
}
include('include/header.php');

$b_id = $_GET['view_details'];
$call = $book_details->getData("SELECT * FROM booked WHERE booking_no='$b_id'");
foreach($call as $row);

?>
<div class="container">
    <div class="card">
        <div class="header ml-5 w-50 shadow bg-info rounded text-light p-3" style="margin-top:-30px;">View Booking Details</div>
        <div class="container">
           <?php
            if(isset($_POST['update'])){
                $status = $_POST['status'];
                $refill_cost = $_POST['refill_cost'];
                $assign_to = $_POST['assign_to'];
                $remark = $_POST['remark'];
                
                $update = $book_details->updateData("UPDATE booked SET status='$status', refill_cost='$refill_cost', assign_to='$assign_to', remark='$remark' WHERE booking_no='$b_id'");
                if($update):
            
            
            ?>
            <div class="alert alert-success mt-3 ">Booking Successfull Assigned <a href="new_assign_booking.php" class="h6 text-danger">click here </a> to manage.</div><?php endif; } 
            if(isset($_POST['again'])){
                $status_1 = $_POST['status_1'];
                $remark_1 = $_POST['remark_1'];
                $date = date('Y-m-d H:i:s', time());
                
                $update_again= $book_details->updateData("UPDATE booked SET status_1='$status_1', remark_1='$remark_1', response_time_1='$date' WHERE booking_no='$b_id'");
                if($update_again){
                    redirect('confirmed_booking');
                }
            }
            if(isset($_POST['deliver'])){
                $status_2 = $_POST['status_2'];
                $remark_2 = $_POST['remark_2'];
                $date_2 = date('Y-m-d H:i:s', time());
 
                $update_again= $book_details->updateData("UPDATE booked SET status_2='$status_2', remark_2='$remark_2', response_time_2='$date_2' WHERE booking_no='$b_id'");
                if($update_again){
                    redirect('confirmed_booking');
                }
            }
            
            
            ?>
            <table class="table table-bordered mt-5">
                <tr>
                    <th colspan="4" class="text-danger text-center">Booking Number : <?= $row['booking_no']; ?></th>
                </tr>
                   <tr>
                    <th colspan="4" class="text-muted">Connection Number : <?php 
                                echo $row['connection_id']; ?></th>
                </tr><tr>
                    <th colspan="2" class="text-info ">Refill size : <?= $row['refill_size']; ?>.2kg</th>
                </tr>
                <tr>
                    <th>Customer Name</th>
                    <td><?= $row['c_name']; ?></td>
                    <th>Customer Email</th>
                    <td><?= $row['c_email']; ?></td>
                </tr>
                   <tr>
                    <th>Customer Phone</th>
                    <td><?= $row['c_phone']; ?></td>
                    <th>Shipping Address</th>
                    <td><?= $row['c_address']; ?></td>
                </tr>
                   <tr>
                    <th>Order Status</th>
                    <td><?php
                    if($row['status'] == ""): ?>
                    <span class="badge badge-danger badge-pill p-2">Pending</span><?php elseif($row['status']=="0"): ?>
                    <span class="badge badge-success badge-pill p-2">Confirmed</span><?php elseif($row['status']=="1"):?><span class="badge badge-danger badge-pill p-2">Cancelled</span><?php endif; ?></td>
                    <th>Booking Date</th>
                    <td><?= $row['booking_time']; ?></td>
                </tr>
                <?php if($row['status']!="0"): ?>
                <tr>
                    <td colspan="4" class="text-center"><a href="#action" data-toggle="modal" class="btn btn-info">Take action</a></td>
                </tr>
                <?php else: endif; ?>
                
            </table>
            <?php if($row['status']!="0"): else: ?>
            <table class="table table-bordered">
                <tr>
                    <th colspan="6" class="text-danger">Response History</th>
                </tr>
                <tr>
                    <th>#</th>
                    <th>Delivery Boy</th>
                    <th>Refilling cost</th>
                    <th>Remark</th>
                    <th>Status</th>
                    <th>Response Time</th>
                </tr>
                <?php $staff= $book_details->getData("SELECT * from staff JOIN booked ON staff.staff_id=booked.assign_to ");
                foreach($staff as $xyz);
                ?>
                <tr>
                    <td>1</td>
                    <td><?= $xyz['s_name']; ?></td>
                    <td><?= $row['refill_cost']; ?></td>
                    <td><?= $row['remark']; ?></td>
                    <td><span class="badge badge-warning badge-pill p-2">confirmed</span></td>
                    <td><?= $row['response_time']; ?></td>
                </tr>
                <?php if($row['status_1']==""): ?>
                <tr><td colspan="6" class="text-center"><a href="#second" class="btn btn-info " data-toggle="modal">Take action</a></td></tr><?php else: ?>
                <tr>
                    <td>2</td>
                    <td><?= $xyz['s_name']; ?></td>
                    <td><?= $row['refill_cost']; ?></td>
                    <td><?= $row['remark_1']; ?></td>
                    <td><span class="badge badge-info badge-pill p-2">On the way</span></td>
                    <td><?= $row['response_time_1']; ?></td>
                </tr>
                <?php endif; 
                if($row['status_1']=="1"):
                
                if($row['status_2']==""): ?>
                <tr><td colspan="6" class="text-center"><a href="#third" class="btn btn-info " data-toggle="modal">Take action</a></td></tr><?php else: ?>
                <tr>
                    <td>3</td>
                    <td><?= $xyz['s_name']; ?></td>
                    <td><?= $row['refill_cost']; ?></td>
                    <td><?= $row['remark_2']; ?></td>
                    <td><span class="badge badge-success badge-pill p-2">Delivered</span></td>
                    <td><?= $row['response_time_2']; ?></td>
                </tr><?php endif; endif;?>
                
                
                
            </table>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="modal fade" id="action" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form action="" method="post">
        <div class="form-row mb-3">
            <label for="" class="col-4">Remark</label>
            <textarea name="remark" class="form-control col" id="" cols="30" rows="7"></textarea>
        </div>
        <div class="form-row mb-3">
            <label for="" class="col-4">Refilling cost</label>
            <input type="text" class="form-control col" name="refill_cost">
        </div>
          <div class="form-row mb-3">
              <label for="" class="col-4">Assign to</label>
              <select name="assign_to" id="" class="form-control col">
                  <option value="" selected></option>
                  <?php $query=$book_details->getData("SELECT * FROM staff"); foreach($query as $value): ?>
                  <option value="<?= $value['staff_id']; ?>"><?= $value['s_name']; ?></option>
                  <?php endforeach; ?>
              </select>
          </div>
           <div class="form-row mb-3">
            <label for="" class="col-4">Status</label>
            <select name="status" required class="form-control col" id="">
                <option value="" disabled hidden selected>Select Status</option>
                <option value="0">Confirmed</option>
                <option value="1">Cancelled</option>
            </select>
        </div>
        <input type="submit" value="update" class="btn btn-info float-right" name="update">
    </form>
      </div>
     
    </div>
  </div>
</div>
 
 <div class="modal fade" id="second" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form action="" method="post">
        <div class="form-row mb-3">
            <label for="" class="col-4">Remark</label>
            <textarea name="remark_1" class="form-control col" id="" cols="30" rows="7"></textarea>
        </div>
        
           <div class="form-row mb-3">
            <label for="" class="col-4">Status</label>
            <select name="status_1"  class="form-control col" id="">
                <option value="1" selected>On the Way</option>
                
            </select>
        </div>
        
        <input type="submit" value="update" class="btn btn-info float-right" name="again">
    </form>
      </div>
     
    </div>
  </div>
</div>
<div class="modal fade" id="third" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form action="" method="post">
        <div class="form-row mb-3">
            <label for="" class="col-4">Remark</label>
            <textarea name="remark_2" class="form-control col" id="" cols="30" rows="7"></textarea>
        </div>
        
           <div class="form-row mb-3">
            <label for="" class="col-4">Status</label>
            <select name="status_2"  class="form-control col" id="">
                <option value="1" selected>Delivered</option>
                
            </select>
        </div>
        <input type="submit" value="update" class="btn btn-info float-right" name="deliver">
    </form>
      </div>
     
    </div>
  </div>
</div>






<?php
include('include/footer.php'); ?>
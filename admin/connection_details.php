<?php 

require_once('../config/function.php');
$get = new Ogbs();

if(!isset($_SESSION['admin_login'])){
    redirect('login');
}
include('include/header.php'); 
$id = $_GET['view_details'];
$call = $get->getData("SELECT * FROM connection WHERE connection_id='$id'");
foreach($call as $row); 
?>

<div class="col-lg-12">
    <div class="card border-0 p-3 mb-4">
        <table class="table table-bordered">
            <tr>
                <th>Request no.</th>
                <td colspan="3"><?= $row['connection_id']; ?></td>
                
            </tr>
            <tr>
                <th>Name</th>
                <td><?= $row['full_name']; ?></td>
                <th>Mobile number</th>
                <td><?= $row['phone']; ?></td>
                
            </tr>
            <tr>
                <th>Email</th>
                <td><?= $row['email']; ?></td>
                <th>Gender</th>
                <td><?= $row['gender']; ?></td>
            </tr>
            <tr>
                <th>Date of birth</th>
                <td><?= $row['dob']; ?></td>
                <th>Nationality</th>
                <td><?= $row['nationality']; ?></td>
            </tr>
            <tr>
                <th>Marital Status</th>
                <td><?= $row['marital']; ?></td>
                <th>Address</th>
                <td><?= $row['address']; ?></td>
            </tr>
            <tr>
                <th>Address Proof/ ID proof</th>
                <td><img src="../admin/image/<?= $row['doc']; ?>" class=" h-25 " alt=""></td>
                <th>Appilied Date</th>
                <td><?= $row['applied_time']; ?></td>
            </tr>
            <tr>
                <th>Connection Status</th>
                <td colspan="3"><?php
                    if($row['status'] == ""): ?>
                    <span class="badge badge-danger badge-pill p-2">Pending</span><?php elseif($row['status']=="0"): ?>
                    <span class="badge badge-warning badge-pill p-2">Onhold</span><?php elseif($row['status']=="1"):?><span class="badge badge-success badge-pill p-2">approved</span><?php elseif($row['status']=="2"): ?><span class="badge badge-danger badge-pill p-2">rejected</span> <?php endif; ?>
                    </td>
            </tr>
        </table>
        <table class="table table-bordered">
            <tr>
                <th colspan="4" class="table-danger">FATHER OR SPOUSE DETAILS</th>
            </tr>
            <tr>
                <th>Relation</th>
                <td><?= $row['relation']; ?></td>
                <th>Full name</th>
                <td><?= $row['related_name']; ?></td>
                            
            </tr>
            <tr>
                <th>Phone</th>
                <td><?= $row['related_phone']; ?></td>
                <th>Address</th>
                <td><?= $row['related_address']; ?></td>
            </tr>
        </table>
        <?php if($row['status']== ""|| $row['status']== "0" || $row['status']== "2"): ?>
        <a  href="#action" class="btn btn-info mb-5" data-toggle="modal">Take Action </a><?php else: endif; ?>
    </div>
</div>

<?php
if(isset($_POST['update'])){
    $status = $_POST['status'];
    $remark = $_POST['remark'];
    $c_cost = $_POST['c_cost'];
    
    $update= $get->updateData("UPDATE connection SET status='$status', remark='$remark', c_cost='$c_cost' WHERE connection_id='$id'");
    if($update):
    redirect('index');
    endif;
    
}?>

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
            <textarea name="remark" class="form-control col" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-row mb-3">
            <label for="" class="col-4">Connection cost</label>
            <input type="text" class="form-control col" name="c_cost">
        </div>
           <div class="form-row mb-3">
            <label for="" class="col-4">Status</label>
            <select name="status" required class="form-control col" id="">
                <option value="" disabled hidden selected>Select Status</option>
                <option value="0">Onhold</option>
                <option value="1">Approved</option>
                <option value="2">Cancelled</option>
            </select>
        </div>
        <input type="submit" value="update" class="btn btn-info float-right" name="update">
    </form>
      </div>
     
    </div>
  </div>
</div>

<?php include('include/footer.php'); ?>
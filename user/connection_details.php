<?php 

require_once('../config/function.php');
$get = new Ogbs();
if(!isset($_SESSION['user_login'])){
    redirect('login');
}
include('include/header.php'); 
$id = $_GET['view'];
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
        <?php if($row['status']== ""): ?>
        <a  href="" class="btn btn-info mb-5">Edit </a><?php else: endif; ?>
    </div>
</div>


<?php include('include/footer.php'); ?>
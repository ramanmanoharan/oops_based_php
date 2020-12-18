<?php include('../config/function.php');
include('include/header.php'); 
$book = new Ogbs();
if(!isset($_SESSION['user_login'])){
    redirect('login');
}
$c_id = $_GET['view'];
$call = $book->getData("SELECT * FROM connection WHERE connection_id= '$c_id'");
foreach($call as $row);
?>
<div class="col-lg-12 p-5 ">
   <?php if(isset($_POST['send'])):
    $connection_id = $_POST['connection_id'];
    $name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $refill_size = $_POST['refill_size'];
    $user_id = $_POST['user_id'];
    
    $query = $book->insertData("INSERT INTO booked(c_name, c_phone, c_email, c_address, refill_size, user_id, connection_id) value('$name','$phone','$email','$address','$refill_size','$user_id','$connection_id')");
    if($query){
        $bookingno = $book->getData("SELECT * FROM booked ");
        foreach($bookingno as $value);
    ?>
    <div class="alert alert-success">Your Cylinder has been Book successfully. Your booking No is <p class="text-danger"><?= $value['booking_no']; ?></p></div><?php } else{ ?>
    <div class="alert alert-danger">SOMETHING WENT WRONG</div><?php }endif; ?>
    
    <div class="card rounded-0 border-0">
        <div class="card-header text-light bg-dark">Book Your Cylinder</div>
            <table class="table table-bordered">
            <tr>
                <th colspan="2" class="text-center text-info">Connection No : <?= $row['connection_id']; ?></th>
            </tr>
            <tr>
                <th>Consumer Name</th>
                <td><?= $row['full_name']; ?></td>
            </tr>
            <tr>
                <th>Registered Contact No</th>
                <td><?= $row['phone']; ?></td>
            </tr>
            <tr>
                <th>Email address</th>
                <td><?= $row['email']; ?></td>
            </tr>
            <tr>
                <th>Shipping Address</th>
                <td><?= $row['address']; ?></td>
            </tr>
        </table>
    <form action="" method="post">
        <input type="text" value="<?= $row['full_name']; ?>" hidden name="full_name">
        <input type="text" value="<?= $row['phone']; ?>" hidden name="phone">
        <input type="text" value="<?= $row['email']; ?>" hidden name="email">
        <input type="text" value="<?= $row['address']; ?>" hidden name="address">
        <input type="text" value="<?= $row['connection_id']; ?>" hidden name="connection_id">
        <input type="text" value="<?= $row['user_id']; ?>" hidden name="user_id">
    
<button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target="#book">
 Book
</button>

<!-- Modal -->
<div class="modal fade" id="book" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
            <label for="" class="col-4">Refill cylinder for:</label>
            <select name="refill_size" id="" class="form-control col">
                <option value="" hidden disabled selected>Select </option>
                <option value="14">14.2 kg</option>
                <option value="5">5 kg</option>
                <option value="30">30 kg</option>
            </select>
        </div>
        <input type="submit" name="send" value="book" class="btn btn-success float-right mt-5">
      </div>
      
    </div>
  </div>
</div>
 
  </form>
   
   
    </div>
</div>








<?php
include('include/footer.php'); ?>
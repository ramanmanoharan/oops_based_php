<?php 

require_once('../config/function.php');
$inconn = new Ogbs();
if(!isset($_SESSION['user_login'])){
    redirect('login');
}

include('include/header.php'); 
$id = $_GET['con_id'];


if(isset($_POST['add'])){
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $nationality = $_POST['nationality'];
    $marital = $_POST['marital'];
    $address = $_POST['address'];
    $town = $_POST['town'];
    $zip = $_POST['zip'];
    $relation = $_POST['relation'];
    $related_name = $_POST['related_name'];
    $related_address = $_POST['related_address'];
    $related_phone = $_POST['related_phone'];
    $user_id = 1;
    
    $doc = $_FILES['doc']['name'];
    $tmp_doc = $_FILES['doc']['tmp_name'];
    
    move_uploaded_file($tmp_doc,"../admin/image/$doc");
    
    /*$update= $new->updateData("UPDATE connection SET full_name='$full_name', email='$email', phone='$phone', gender='$gender', dob='$dob', nationality='$nationality',  ") */
    
    $insert= $inconn->insertData("INSERT INTO connection(full_name, email, phone, gender, dob, nationality, marital, address, town, zip, relation, related_name, related_address, related_phone, doc, user_id) value('$full_name','$email','$phone','$gender','$dob','$nationality','$marital','$address','$town','$zip','$relation','$related_name','$related_address','$related_phone','$doc', $user_id)");
    
    if($insert){

?>
<div class="alert alert-success mb-5">Request Successfully Added <a href="http://localhost/ogbs/user/connection_list.php" class="text-info"><strong>Click here</strong></a> to check status.</div><?php }else{ ?>
<span class="alert alert-danger">Something Went Wrong</span><?php } } ?>
<?php 

$call = $inconn->getData("SELECT * FROM connection WHERE connection_id = '$id'");
foreach($call as $row); 

?>
<div class="col-lg-12 mx-auto my-5 pt-2">
    <div class="card border-0 shadow ">
       <div class="header col-lg-10 shadow text-light bg-danger rounded mx-auto p-3" style="margin-top:-20px;">New Update Form</div>
        <div class="col-lg-7 mx-auto mt-5">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="form-row mb-3">
                <label for="name" class="col-3 h6">Full Name</label>
                <input type="text" name="full_name" value="<?= $row['full_name']; ?>" id="name" class="form-control col">
            </div>
        <div class="form-row mb-3">
                <label for="email" class="col-3 h6">Email</label>
                <input type="email" name="email" id="email" value="<?= $row['email']; ?>" class="form-control col">
            </div>
        <div class="form-row mb-3">
                <label for="phone" class="col-3 h6">Phone</label>
                <input type="tel" name="phone" id="phone" value="<?= $row['phone']; ?>" class="form-control col">
            </div>
        <div class="form-row mb-3">
                <label for="" class="col-3 h6">Gender</label>
                <input type="text" name="gender" value="<?= $row['gender']; ?>" class="form-control  col">
                
            </div>
        <div class="form-row mb-3">
                <label for="dob" class="col-3 h6">Date Of Birth</label>
                <input type="date" name="dob" id="dob" class="form-control col" value="<?= $row['dob']; ?>">
            </div>
        <div class="form-row mb-3">
                <label for="nationality" class="col-3 h6">Nationality</label>
                <input type="text" name="nationality" id="nationality" class="form-control col" value="<?= $row['nationality']; ?>">
            </div>
        <div class="form-row mb-3">
                <label for="marital" class="col-3 h6">Marital Status</label>
                    <input type="text" name="marital" value="<?= $row['marital']; ?>" class="form-control col">          
                     </div>
                     <div class="form-row mb-3 h6">
                         <label for="address" class="col-3">Address</label>
                         <input type="text" name="address" id="address" class="col form-control" value="<?= $row['address']; ?>">
                     </div>
                        <div class="form-row mb-3 h6">
                         <label for="town" class="col-3">District</label>
                         <input type="text" name="town" value="<?= $row['town']; ?>" id="town" class="col form-control">
                     </div>
                        <div class="form-row mb-3 h6">
                         <label for="zip" class="col-3">Zip code</label>
                         <input type="tel" name="zip" value="<?= $row['zip']; ?>" id="zip" class="col form-control">
                     </div>
                     <h4 class="text-center text-info h6 mt-4">FATHER OR SPOUSE DETAILS</h4>
                     <div class="form-row my-4">
                         <label for="" class="font-weight-bold col-3">Select Relation</label>
                         <input type="text" name="relation" value="<?= $row['relation']; ?>" class="form-control col">
                     </div>
                     <div class="form-row mb-3 h6">
                         <label for="" class="col-3">Full Name</label>
                         <input type="text" name="related_name" value="<?= $row['related_name']; ?>" class="form-control col">
                     </div>
                        
                        <div class="form-row mb-3 h6">
                         <label for="" class="col-3">Address</label>
                         <input type="text" name="related_address" value="<?= $row['related_address']; ?>" class="form-control col">
                     </div>
                        <div class="form-row mb-3 h6">
                         <label for="" class="col-3">Phone</label>
                         <input type="text" name="related_phone" value="<?= $row['related_phone']; ?>" class="form-control col">
                     </div>
                     <div class="form-row">
                         <label for="" class="h6 col-3">Upload document(id proof or address proof)</label>
                         <input type="file" class="form-control col" name="doc" required>
                     </div>
                     <input type="submit" class="btn btn-info rounded-0 btn-block mt-3" value="+ ADD" name="add">
        </form>
        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>
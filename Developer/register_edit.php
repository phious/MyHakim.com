<?php 
include('include/header.php');
include('include/navbar.php');
?>

<div class= "card shadow mb-4">
    <div class="card-header py-3">
<h6 class="m-0 font-weight-bold text-primary"> Edit hospital names</h6>
</div>
<div class="card-body">
<?php
require '../connection.php';

if(isset($_POST['edit_btn'])) {

    $id = $_POST['edit_id'];

    $query = "SELECT * FROM `hospital` WHERE hid='$id' ";
    $query_run = mysqli_query($database, $query);

    foreach($query_run as $row) {
        ?>
 
    <form action="code.php" method="POST">
        <input type="hidden" name="edit_id" value="<?php echo $row['hid']?>">
        <div class="form-group">
        <label>Hospital Name</label>
        <input type="text" name="edit_hospitalName" value="<?php echo $row['hosname']?>" class="form-control" placeholder="hospital name">
        </div>
        <div class="form-group">
        <label>Address</label>
        <input type="text" name="edit_address" value="<?php echo $row['hosaddress']?>" class="form-control" placeholder="address">
        </div>
        <div class="form-group">
        <label>Email</label>
        <input type="email" name="edit_email" value="<?php echo $row['hosemail']?>" class="form-control" placeholder="Enter email">
        </div>
        <div class="form-group">
        <label>Telephone Number</label>
        <input type="text" name="edit_tele" value="<?php echo $row['hostel']?>" class="form-control" placeholder="telephone">
        </div>
        <a href="addHospitals.php" class="btn btn-danger" >CANCEL</a>
        <button  type="submit" name="updatebtn" class="btn btn-primary" >update</button>
    </fom>
    <?php
    }
}
?>
</div>

<?php
include('include/scripts.php');
include('include/footer.php');
?>
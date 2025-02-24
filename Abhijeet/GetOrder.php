<?php
require('top.php');

$msg="";
if (isset($_GET['choice'])) {
  $choice = $_GET['choice'];
  $id = $_GET['id'];

  $id = $_GET['id'];
  $sql="SELECT * from menu_category WHERE id=$id";
  $run=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($run);
}

if (isset($_POST['dinning'])) {
  $name = $_POST['name'];
  $mobile = $_POST['mobile'];
  $datetime = $_POST['datetime'];
  $choice = $_GET['choice'];
  $product_id = $_GET['id'];
  $date = strtotime($datetime);
  $InputDate = date('Y-m-d h:i:s',$date);  
  $username = $_SESSION['USER_NAME'];  

  //$currentDateTime = $date = date('Y-m-d H:i:s');

  $currentDateTime = date("Y-m-d h:i:s", strtotime('+20 hours'));

  if ($currentDateTime > $InputDate) {
    $msg = "Date";
  }else{
    $added_on=date('Y-m-d h:i:s');
    $result = mysqli_query($conn,"insert into order_history(`user_id`, `product_id`, `name`, `mobile`, `type`, `DateAndTime`, `added_on`) values('1','$product_id','$name','$mobile','$choice','$InputDate','$added_on')");
    if ($result) {
      $msg = "Success";
    }
    else{
      $msg = "Error";
    }
  }
}

if ($choice == "Dinning") {
  ?>
  <form method="post">
  <div class="form-group mt-5">
    <label>Booking For:</label>
    <label><?php echo $choice; ?></label>              
  </div>
  <div class="form-group">
    <label>Name:</label>
    <input type="text" class="form-control" name="name" id="name" required placeholder="Your Name*" value="<?php echo $_SESSION['USER_NAME']; ?>" style="width:100%">
  </div>
  <div class="form-group">
    <label>Mobile:</label>
    <input type="text" class="form-control" name="mobile" id="mobile" required placeholder="Your Name*" value="<?php echo getUserMobile($conn, $_SESSION['USER_ID']); ?>" style="width:100%">
  </div>
  <!-- <div class="form-group">
    <label>Quantity:</label>
    <input type="number" class="form-control" name="qty" id="qty" required placeholder="Quantity*" value="1" style="width:100%" maxlength="10" minlength="1"><br>
    <a href="javascript:void(0)" onclick="rate()" class="btn btn-success">Update</a>
  </div> -->
  <div class="form-group">
    <label>Date Time:</label>
    <input type="datetime-local" class="form-control" name="datetime" required style="width:100%">
  </div>
  <button type="submit" name="dinning" class="btn btn-primary">Submit</button>
</form>
<div class="form-output login_msg" style="margin-top: 30px!important;">
            <?php 
             if ($msg == "Success") {
               echo "<script>alert('Recored Successfully!')</script>";
             }else if ($msg == "Error") {
               echo "<script>alert('Error Occured!')</script>";
             }else if($msg == "Date"){
                echo "<script>alert('Please Select Proper Date Time!')</script>";
             }
            ?>
          </div>

  <?php
}else if ($choice == "TakeAway") {
  ?>
  <form method="post">
  <div class="form-group mt-5">
    <label>Booking For:</label>
    <label><?php echo $choice; ?></label>              
  </div>
  <div class="form-group">
    <label>Name:</label>
    <input type="text" class="form-control" name="name" id="name" required placeholder="Your Name*" value="<?php echo $_SESSION['USER_NAME']; ?>" style="width:100%">
  </div>
  <div class="form-group">
    <label>Mobile:</label>
    <input type="text" class="form-control" name="mobile" id="mobile" required placeholder="Your Name*" value="<?php echo getUserMobile($conn, $_SESSION['USER_ID']); ?>" style="width:100%">
  </div>
  <!-- <div class="form-group">
    <label>Quantity:</label>
    <input type="number" class="form-control" name="qty" id="qty" required placeholder="Quantity*" value="1" style="width:100%" maxlength="10" minlength="1"><br>
    <a href="javascript:void(0)" onclick="rate()" class="btn btn-success">Update</a>
  </div> -->
  <div class="form-group">
    <label>Date Time:</label>
    <input type="datetime-local" class="form-control" name="datetime" required style="width:100%">
  </div>
  <button type="submit" name="takeaway" class="btn btn-primary">Submit</button>
</form>
  <?php
}
?>
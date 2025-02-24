<?php 
require('top.php');

$msg = "";
if(!isset($_SESSION['USER_LOGIN'])){
  ?>
  <script>
    alert("Please Login!");
    window.location.href='login.php';
  </script>
  <?php
}

if(!isset($_GET['id'])){
  ?>
  <script>
    window.location.href='menu.php';
  </script>
  <?php
}

if (isset($_GET['id'])){
  $id = $_GET['id'];
  $sql="SELECT * from menu_product WHERE id=$id";
  $run=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($run);
}

if (isset($_POST['dinning'])) {
  $name = $_POST['name'];
  $mobile = $_POST['mobile'];
  $datetime = $_POST['datetime'];
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
    $result = mysqli_query($conn,"insert into order_history(`user_id`, `product_id`, `name`, `mobile`, `type`, `DateAndTime`, `added_on`) values('1','$product_id','$name','$mobile','Dinning','$InputDate','$added_on')");
    if ($result) {
      $msg = "Success";
    }
    else{
      $msg = "Error";
    }
  }
}

if (isset($_POST['takeaway'])) {
  $name = $_POST['name'];
  $mobile = $_POST['mobile'];
  $datetime = $_POST['datetime'];
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
    $result = mysqli_query($conn,"insert into order_history(`user_id`, `product_id`, `name`, `mobile`, `type`, `DateAndTime`, `added_on`) values('1','$product_id','$name','$mobile','Take Away','$InputDate','$added_on')");
    if ($result) {
      $msg = "Success";
    }
    else{
      $msg = "Error";
    }
  }
}

?>
<body>
  <?php 
  require('header.php');
  ?>
  <div class="tm-main-section light-gray-bg">
    <div class="container" id="main">
      <section class="tm-section tm-section-margin-bottom-0 row">
        <div class="col-lg-12 tm-section-header-container">
          <h2 class="tm-section-header gold-text tm-handwriting-font"> Booking</h2>
          <div class="tm-hr-container"><hr class="tm-hr"></div>
        </div>
        <div class="col-lg-12 tm-popular-items-container">
          <div class="container text-center">
            <div class="row">
              <div class="col-lg-12 col-12 col-md-12 col-12 ">
                <div class="col-xs-12">
                  <div class="contact-title">
                    <h2>Ordering</h2>
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="form-group mt-5">
                    <label>Product Name: <?php echo $row['name']; ?></label><br>
                    <label>Price: <?php echo $row['price']; ?></label> 
                    <input type="hidden" name="head" value="<?php echo $row['name']; ?>">               
                  </div>

                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Dinning">Dinning</button> 
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#TakeAway">Take Away</button> 

                </div>
                <div class="form-output login_msg" style="margin-top: 30px!important;">
                  <?php 
                 
                ?>
              </div>            
            </div>
          </div>
        </div>         
      </div>       
    </section>
  </div>
</div> 

<div class="modal fade text-center" id="Dinning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<form method="POST">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Order Now</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="form-group mt-5">
          <label>Booking For: Dinning</label>          
        </div>
        <div class="form-group">
          <label>Name:</label>
          <input type="text" class="form-control" name="name" id="name" required placeholder="Your Name*" value="<?php echo $_SESSION['USER_NAME']; ?>" style="width:100%">
        </div>
        <div class="form-group">
          <label>Mobile:</label>
          <input type="text" class="form-control" name="mobile" id="mobile" required placeholder="Your Name*" value="<?php echo getUserMobile($conn, $_SESSION['USER_ID']); ?>" style="width:100%">
        </div>
        <div class="form-group">
          <label>Quantity:</label>
          <input type="number" class="form-control" name="qty" id="qty" required placeholder="Quantity*" value="1" style="width:100%" maxlength="10" minlength="1"><br>
          <a href="javascript:void(0)" onclick="rate()" class="btn btn-success">Update</a>
        </div>
        <div class="form-group">
          <label>Price: </label>
          <label id="totalprice"><?php echo $row['price']; ?></label>
          <input type="hidden" id="price" value="<?php echo $row['price']; ?>">
        </div>
        <div class="form-group">
          <label>Date Time:</label>
          <input type="datetime-local" class="form-control" name="datetime" required style="width:100%">
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="submit" name="dinning" class="btn btn-success">Order Now</button>
      </div>
    </div>
  </div>
</form>              
</div>


<div class="modal fade text-center" id="TakeAway" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<form method="POST">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Order Now</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="form-group mt-5">
          <label>Booking For: Take Away</label>          
        </div>
        <div class="form-group">
          <label>Name:</label>
          <input type="text" class="form-control" name="name" id="name" required placeholder="Your Name*" value="<?php echo $_SESSION['USER_NAME']; ?>" style="width:100%">
        </div>
        <div class="form-group">
          <label>Mobile:</label>
          <input type="text" class="form-control" name="mobile" id="mobile" required placeholder="Your Name*" value="<?php echo getUserMobile($conn, $_SESSION['USER_ID']); ?>" style="width:100%">
        </div>
        <div class="form-group">
          <label>Quantity:</label>
          <input type="number" class="form-control" name="qty" id="qty" required placeholder="Quantity*" value="1" style="width:100%" maxlength="10" minlength="1"><br>
          <a href="javascript:void(0)" onclick="rate()" class="btn btn-success">Update</a>
        </div>
        <div class="form-group">
          <label>Price: </label>
          <label id="totalprice"><?php echo $row['price']; ?></label>
          <input type="hidden" id="price" value="<?php echo $row['price']; ?>">
        </div>
        <div class="form-group">
          <label>Date Time:</label>
          <input type="datetime-local" class="form-control" name="datetime" required style="width:100%">
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="submit" name="takeaway" class="btn btn-success">Order Now</button>
      </div>
    </div>
  </div>
</form>             
</div>
<?php 
if ($msg == "Success") {
 echo "<script>alert('Recored Successfully!')</script>";
}else if ($msg == "Error") {
 echo "<script>alert('Error Occured!')</script>";
}else if($msg == "Date"){
  echo "<script>alert('Please Select Proper Date Time!')</script>";
}
?>

<?php
include('footer.php');
?>    
</body>

<script type="text/javascript">
  function rate(){
    var qty = document.getElementById("qty").value;
    var price = document.getElementById("price").value;

    var total = qty * price;
    document.getElementById("totalprice").innerHTML = total;
  }
</script>
</html>
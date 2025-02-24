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
  $sql="SELECT * from menu_category WHERE id=$id";
  $run=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($run);
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
                    <h2><?php echo $row['name']; ?></h2>
                  </div>
                </div>
                <div class="tm-menu-product-content col-lg-12 col-md-12 col-12"> <!-- menu content -->
                  <?php
                  $get_menu_product = get_menu_product($conn, $id);
                  foreach ($get_menu_product as $list) {
                    ?>
                    <div class="tm-product">
                      <img src="img/Menu-3.jpg" alt="Product">
                      <div class="tm-product-text">
                        <h3 class="tm-product-title"><?php echo $list['name']?></h3>
                        <p class="tm-product-description"><?php echo $list['short_desc']?></p>
                        <p class="tm-product-description">MRP: <s><?php echo $list['mrp']?></s> Price: <?php echo $list['price']?></p>
                      </div>
                      <div class="tm-product-price">
                        <a href="order_product.php?id=<?php echo $list['id'] ?>" class="order-now-link tm-handwriting-font">Order Now</a>
                      </div>
                    </div>
                    <?php
                  }
                  ?>              
                </div>
              </div>
            </div>
          </div>         
        </div>       
      </section>
    </div>
  </div> 

  <?php
  include('footer.php');
  ?>    
</body>
</html>
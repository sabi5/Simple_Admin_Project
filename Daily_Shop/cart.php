<?php
  session_start();
  require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <?php require "links.php";?>
  </head>
  <body>
   
   <!-- wpf loader Two -->
    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
    <!-- / wpf loader Two -->       
 <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->

<?php require "header.php";?>

  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Cart Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Cart</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Remove</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>

                    <?php $grandTotal = 0;
                          $totalItem = 0;
                    foreach ($_SESSION['cart'] as $key=>$value) {?>
                      <tbody>
                        <tr>
                          <td><form action=<?php echo "deletecart.php?id=".$_SESSION['cart'][$key]['product_id'].
                              "&action=deleteproduct"?> method = 'POST'><input class="remove" type='submit' name='delete'
                                value='Delete'></form></td>
                          <td><a href="#"><img src="<?php echo "img/".$_SESSION['cart'][$key]['image'];?>" alt="img"></a></td>
                          <td><a class="aa-cart-title" href="#"><?php echo $_SESSION['cart'][$key]['name'];?></a></td>
                          <td><?php echo "$".$_SESSION['cart'][$key]['price'];?></td>
                          <td><input class="aa-cart-quantity" type="number" value="<?php echo $_SESSION['cart'][$key]['quantity'];?>"></td>
                          <td><?php echo "$".$_SESSION['cart'][$key]['quantity'] * $_SESSION['cart'][$key]['price'];?></td>
                        </tr>
                        <?php  $grandTotal += $_SESSION['cart'][$key]['quantity'] *
                              $_SESSION['cart'][$key]['price'];
                              $totalItem += $_SESSION['cart'][$key]['quantity'];?>
                        <?php } 
                        //$_SESSION['checkout'] = $_SESSION['cart']; 
                        $_SESSION['grand_total'] = $grandTotal; 

                        ?>
                        
                      </tbody>
                  </table>
                </div>
             </form>
               <!-- Cart Total view --> 
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>grandTotal</th>
                     <td><?php echo $grandTotal;?></td>
                   </tr>
                   <tr>
                     <th>totalItem</th>
                     <td><?php echo $totalItem;?></td>
                   </tr>
                 </tbody>
                 
               </table>
               <a href="checkout.php?grand_total=<?php echo $grandTotal; ?>" class="aa-cart-view-btn">Proced to Checkout</a>
               <a href="product.php" class="aa-cart-view-btn">Continue Shopping</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->


  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->

  <?php require "footer.php";?>

  <?php require "login.php";?>

<?php require "links.php";?>
    
    
  </body>
</html>
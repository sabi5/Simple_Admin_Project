<?php
  session_start();
  require "connection.php";

  //$id=$_GET ['cat_id'];
  if (isset($_GET['action'])) {
    if ($_GET['action']=='addproduct') {
        $id = $_GET['id'];

        $query = "SELECT * FROM products WHERE product_id='$id'";
        $result = mysqli_query($con, $query);

        if ($result->num_rows>0) {
            $row1 = $result->fetch_assoc();
            idExist($id, $row1);
        }
       
    } 

  } else {
      $_SESSION['cart'] = array();
     
  }

  function idExist($id, $row1) 
  {

      foreach ($_SESSION['cart'] as $key=>$value) {
          if ($id == $_SESSION['cart'][$key]['product_id']) {
              
              $_SESSION['cart'][$key]['quantity'] += 1;
              return;
          }  
           
      }
      array_push($_SESSION['cart'], $row1);
      print_r ( $_SESSION['cart']); 
      
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Daily Shop | Product</title>
    
    <?php require "links.php";?>

  </head>
  <!-- !Important notice -->
  <!-- Only for product page body tag have to added .productPage class -->
  <body class="productPage">  
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
        <h2>Fashion</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>         
          <li class="active">Women</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sort by</label>
                  <select name="">
                    <option value="1" selected="Default">Default</option>
                    <option value="2">Name</option>
                    <option value="3">Price</option>
                    <option value="4">Date</option>
                  </select>
                </form>
                <form action="" class="aa-show-form">
                  <label for="">Show</label>
                  <select name="">
                    <option value="1" selected="12">12</option>
                    <option value="2">24</option>
                    <option value="3">36</option>
                  </select>
                </form>
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <!-- start single product item -->
                
                <?php
                if(isset($_GET['cat_id'])) {
                  $id_cat=$_GET ['cat_id'];
                 
                  $sql="SELECT * FROM products WHERE category_id=$id_cat ";
                  $res = mysqli_query($con, $sql)or die($mysqli_error($con));
                  
                  if (mysqli_num_rows($res) >= 1) {
                    while ($data = mysqli_fetch_array($res)) {
                      
                ?>
                      
                <li> 
                  <figure>
                    <a class="aa-product-img" href="#"><img src="<?php echo "img/". $data['image'];?>" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn" href="<?php echo 'product.php?id='.$data['product_id'].'&action=addproduct'?>"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="#"><?php echo $data['name']?></a></h4>
                      <span class="aa-product-price"><?php echo "$".$data['price']?></span><span class="aa-product-price"><del>$65.50</del></span>
                       <p class="aa-product-descrip">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam accusamus facere iusto, autem soluta amet sapiente ratione inventore nesciunt a, maxime quasi consectetur, rerum illum.</p>
                    </figcaption>
                  </figure>
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                  </div>
                </li> 
               
                  <?php
                      
                      }
                      
                    }
                  
                } elseif (isset($_GET['tag_id'])) {
                  
                    $id_tag=$_GET ['tag_id'];
                    //$id_tagt=$_GET ['tag_id'];
                    $sql="SELECT * FROM products WHERE tag_id=$id_tag ";
                    $res = mysqli_query($con, $sql)or die($mysqli_error($con));
                    
                    if (mysqli_num_rows($res) >= 1) {
                      while ($data = mysqli_fetch_array($res)) {
                        
                  ?>
                        
                  <li> 
                    <figure>
                      <a class="aa-product-img" href="#"><img src="<?php echo "img/". $data['image'];?>" alt="polo shirt img"></a>
                      <a class="aa-add-card-btn" href="<?php echo 'product.php?id='.$data['product_id'].'&action=addproduct'?>"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                      <figcaption>
                        <h4 class="aa-product-title"><a href="#"><?php echo $data['name']?></a></h4>
                        <span class="aa-product-price"><?php echo "$".$data['price']?></span><span class="aa-product-price"><del>$65.50</del></span>
                         <p class="aa-product-descrip">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam accusamus facere iusto, autem soluta amet sapiente ratione inventore nesciunt a, maxime quasi consectetur, rerum illum.</p>
                      </figcaption>
                    </figure>
                    <div class="aa-product-hvr-content">
                      <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                    </div>
                  </li> 
                 
                    <?php
                        
                        }
                        
                      }
                    
                  } 
                
                else {
                  $results_per_page = 10;
                  
                  if (!isset($_GET['page'])) {
                    $page = 1;
                  } else {
                    $page = $_GET['page'];
                  }

                  $this_page = ($page-1)*$results_per_page;
                    
                  $sql="SELECT * FROM products LIMIT $this_page,$results_per_page";
                  $res = mysqli_query($con, $sql)or die($mysqli_error($con));
                  
                  if (mysqli_num_rows($res) >= 1) {
                    while ($data = mysqli_fetch_array($res)) {
                ?>
                      
                <li> 
                  <figure>
                    <a class="aa-product-img" href="#"><img src="<?php echo "img/". $data['image'];?>" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn" href="<?php echo 'product.php?id='.$data['product_id'].'&action=addproduct'?>"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="#"><?php echo $data['name'];?></a></h4>
                      <span class="aa-product-price"><?php echo "$".$data['price'];?></span><span class="aa-product-price"><del>$65.50</del></span>
                       <p class="aa-product-descrip">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam accusamus facere iusto, autem soluta amet sapiente ratione inventore nesciunt a, maxime quasi consectetur, rerum illum.</p>
                    </figcaption>
                  </figure>
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="<?php echo '#'.$data['product_id'];?>"><span class="fa fa-search"></span></a>
                  </div>
                </li> 
                  <?php
                      }
                    }
                    }
                  ?>                       
              </ul>
             
              <!-- quick view modal -->
              <?php 
                $sql = "SELECT * FROM products";
                $res = mysqli_query($con, $sql)or die($mysqli_error($con));
                
                if (mysqli_num_rows($res) >= 1) {
                  while ($data = mysqli_fetch_array($res)) {
              ?>                  
              <div class="modal fade" id="<?php echo $data['product_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                
                <div class="modal-dialog">
                  <div class="modal-content">                      
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <div class="row">
                          <!-- Modal view slider -->
                          <div class="col-md-6 col-sm-6 col-xs-12">                              
                            <div class="aa-product-view-slider">                                
                              <div class="simpleLens-gallery-container" id="demo-1">
                                <div class="simpleLens-container">
                                    <div class="simpleLens-big-image-container">
                                        <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png" >
                                          <img src= "<?php echo "img/". $data['image'];?>" class="simpleLens-big-image">
                                        </a>
                                    </div>
                                </div>
                                
                              </div>
                            </div>
                          </div>
                          <!-- Modal view content -->
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="aa-product-view-content">
                              <h3><?php echo $data['name'];?></h3>
                              <div class="aa-price-block">
                                <span class="aa-product-view-price"><?php echo "$".$data['price'];?></span>
                                <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                              </div>
                              <p><?php echo $data['description'];?></p>
                              <h4>Size</h4>
                              <div class="aa-prod-view-size">
                                <a href="#">S</a>
                                <a href="#">M</a>
                                <a href="#">L</a>
                                <a href="#">XL</a>
                              </div>
                              <div class="aa-prod-quantity">
                                <form action="">
                                  <select name="" id="">
                                    <option value="0" selected="1">1</option>
                                    <option value="1">2</option>
                                    <option value="2">3</option>
                                    <option value="3">4</option>
                                    <option value="4">5</option>
                                    <option value="5">6</option>
                                  </select>
                                </form>
                                <p class="aa-prod-category">
                                  <?php 
                                      $cat_id=$data['category_id'];
                                      $query="SELECT * FROM categories WHERE category_id = $cat_id";
                                      $result = mysqli_query($con, $query)or die($mysqli_error($con));
                                    
                                      if (mysqli_num_rows($result) >= 1) {
                                        
                                        while ($row = mysqli_fetch_array($result)) {
                        
                                  ?>
                                  Category: <a href="#"><?php echo $row['name'];?></a>
                                </p>
                                  <?php
                                    }
                                  }
                                ?>   
                              </div>
                              <div class="aa-prod-view-bottom">
                                <a href="<?php echo 'product.php?id='.$data['product_id'].'&action=addproduct'?>" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                <a href="<?php echo 'product-detail.php?id='.$data['product_id'].'&action=viewdetail'?>" class="aa-add-to-cart-btn">View Details</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>                        
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <?php
                  }
                }
              ?>    
              <!-- / quick view modal -->   
            </div>
            <div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <?php for($page=1;$page<=5;$page++){
                    echo '<li><a href="product.php?page='.$page.'">'.$page.'</a></li>';
                  }?>
                  
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
                <?php
                  $query="SELECT *FROM categories";
                  $result = mysqli_query($con, $query)or die($mysqli_error($con));
                  $data='';
                  if (mysqli_num_rows($result) >= 1) {
                    
                    while ($row = mysqli_fetch_array($result)) {

                    
                      $data .= '<li><a href="product.php?cat_id='.$row['category_id'].'">'.$row['name'].'</a></li>';	
                      }
                      
                      echo $data;
                  }
                ?>
              
              </ul>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Tags</h3>
              <div class="tag-cloud">
                <?php
                  $query="SELECT *FROM tags";
                  $result = mysqli_query($con, $query)or die($mysqli_error($con));
                  $data1='';
                  if (mysqli_num_rows($result) >= 1) {
                    
                    while ($row1 = mysqli_fetch_array($result)) {

                      
                        $data1 .= '<a href="product.php?tag_id='.$row1['tag_id'].'">'.$row1['name'].'</a>';
                      }
                      echo $data1;
                  }
                ?>
                
              </div>
            </div>
            <!-- single sidebar -->
            <!-- <div class="aa-product-catg-body">
              <ul class="aa-product-catg"> -->
                <!-- start single product item -->
                
                <?php
                
                // $min="0";
                // $max="100";
                //   $sql="SELECT * FROM products WHERE price BETWEEN '$min' AND '$max' ";
                //   $res = mysqli_query($con, $sql)or die($mysqli_error($con));
                //   echo '<script>alert("success");</script>';
                  
                //   if (mysqli_num_rows($res) >= 1) {
                //     echo '<script>alert("success");</script>';
                //     while ($data = mysqli_fetch_array($res)) {
                      
                ?>
                      
                <!-- <li> 
                  <figure>
                    <a class="aa-product-img" href="#"><img src="<?php echo "img/". $data['image'];?>" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn" href="<?php echo 'product.php?id='.$data['product_id'].'&action=addproduct'?>"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="#"><?php echo $data['name']?></a></h4>
                      <span class="aa-product-price"><?php echo "$".$data['price']?></span><span class="aa-product-price"><del>$65.50</del></span>
                       <p class="aa-product-descrip">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam accusamus facere iusto, autem soluta amet sapiente ratione inventore nesciunt a, maxime quasi consectetur, rerum illum.</p>
                    </figcaption>
                  </figure>
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                  </div>
                </li> 
                -->
                  <?php
                      
                    //   }
                    // }
                    
                  ?>
            <div class="aa-sidebar-widget">
              <h3>Shop By Price</h3>              
              <!-- price range -->
              <div class="aa-sidebar-price-range">
               <form action="" method="post">
                  <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>
                  
                  <span id="skip-value-lower" class="example-val" name="min_price" value="<?php echo $min;?>"><?php echo $min;?></span>
                 <span id="skip-value-upper" class="example-val" name="max_price" value="<?php echo $max;?>"><?php echo $max;?></span>
                 <button class="aa-filter-btn" type="submit" name="submit">Filter</button>
               </form>
              </div>              
              
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Color</h3>
              <div class="aa-color-tag">
                <a class="aa-color-green" href="#"></a>
                <a class="aa-color-yellow" href="#"></a>
                <a class="aa-color-pink" href="#"></a>
                <a class="aa-color-purple" href="#"></a>
                <a class="aa-color-blue" href="#"></a>
                <a class="aa-color-orange" href="#"></a>
                <a class="aa-color-gray" href="#"></a>
                <a class="aa-color-black" href="#"></a>
                <a class="aa-color-white" href="#"></a>
                <a class="aa-color-cyan" href="#"></a>
                <a class="aa-color-olive" href="#"></a>
                <a class="aa-color-orchid" href="#"></a>
              </div>                            
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Recently Views</h3>
              <div class="aa-recently-views">
                <ul>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-1.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                   <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>                                      
                </ul>
              </div>                            
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Top Rated Products</h3>
              <div class="aa-recently-views">
                <ul>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-1.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                   <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>                                      
                </ul>
              </div>                            
            </div>
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->


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

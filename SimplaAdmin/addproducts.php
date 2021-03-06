<?php
/**
 * Template File Doc Comment
 * 
 * PHP version 7
 * 
 * @category Template_Class
 * @package  Template_Class
 * @author   Author <author@domain.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */ 
 
session_start();
require "connection.php";
require "header.php";
require "sidebar.php";

if (isset($_POST['submit'])) {
    
    $name= $_POST['name'];
    $image= $_POST['image'];
    $price=$_POST['price'];
    $description=$_POST['description'];
	$category=$_POST['category'];
	$tag=$_POST['checkbox'];
	$tag2 = implode(',', $tag);
	
	// $tsql="SELECT * FROM tags";
    // $tres=mysqli_query($con, $tsql);
	// $trow = mysqli_fetch_assoc($tres);
    //$tag=$trow['tag_id'];

    $sql="SELECT * FROM products";
    $res=mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
    if ($name==$row['name'] ) {
        echo '<script> alert("Product already  exist"); </script>';
    } else {
        $insert_sql="INSERT INTO products (category_id,tag_id,name,image,price,description )VALUES
        ('$category', '$tag2' ,'$name','$image','$price','$description')";
        $iquery=mysqli_query($con, $insert_sql);
        if ($iquery) {
            echo '<script> alert("Product Added successfully") </script>';
            ?>
            <script>location.replace("addproducts.php")</script>
            <?php
        }
    }
}

?>
		
<div id="main-content"> <!-- Main Content Section with everything -->
	
	<noscript> <!-- Show a notification if the user has disabled javascript -->
		<div class="notification error png_bg">
			<div>
				Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
			</div>
		</div>
	</noscript>
	
	<!-- Page Head -->
	<h2>Welcome John</h2>
	<p id="page-intro">What would you like to do?</p>
	
	<div class="clear"></div> <!-- End .clear -->
	
	<div class="content-box"><!-- Start Content Box -->
		
		<div class="content-box-header">
			
			<h3>Add Products</h3>
			
			<ul class="content-box-tabs">
				<li><a href="#tab1" >Manage</a></li> <!-- href must be unique and match the id of target div -->
				<li><a href="#tab2" class="default-tab">Add</a></li>
			</ul>
			
			<div class="clear"></div>
			
		</div> <!-- End .content-box-header -->
		
		<div class="content-box-content">
			
			<div class="tab-content default-tab" id="tab2">
			
				<form action="#" method="post">
					
					<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
						
						<p>
							<label>Name</label>
								<input class="text-input small-input" type="text" id="small-input" name="name" /> <!-- Classes for input-notification: success, error, information, attention -->
								<br />
						</p>
						
						<p>
							<label>Price</label>
							<input class="text-input medium-input datepicker" type="number" id="medium-input" name="price" /> 
						</p>
						
						<p>
							<label>Image</label>
							<input class="text-input large-input" type="file" id="large-input" name="image" />
						</p>
						
						<p>
							<label>Category</label>              
							<select name="category" class="small-input">
								<?php
								$query="SELECT *FROM categories";
								$result = mysqli_query($con, $query)or die($mysqli_error($con));
								$data='';
								if (mysqli_num_rows($result) >= 1) {
									
									while ($row = mysqli_fetch_array($result)) {

										$data .= "<option value='".$row['category_id']."'>".$row['name']."</option>";
											
										}
										echo $data;
								}
								?>
							</select>
						</p>

						<p>
							<label>Tags</label>
							<!-- <input type="checkbox" name="fashion" /> Fashion <input type="checkbox" name="ecommerce" />
							 Ecommerce <input type="checkbox" name="shop" /> Shop <input type="checkbox" name="handbag" /> Hand Bag <input type="checkbox" name="laptop" /> Laptop <input type="checkbox" name="headphone" /> Headphone
							 -->
							<?php
								$query="SELECT *FROM tags";
								$result = mysqli_query($con, $query)or die($mysqli_error($con));
								$data1='';
								if (mysqli_num_rows($result) >= 1) {
									
									while ($row1 = mysqli_fetch_array($result)) {

										$data1 .= "<input type='checkbox' value='".$row1['tag_id']."' name='checkbox[]'/>".$row1['name']."";
											
										}
										echo $data1;
								}
								?>


						</p>
	
						<p>
							<label>Description</label>
							<textarea class="text-input textarea wysiwyg" id="textarea" name="description" cols="79" rows="15"></textarea>
						</p>
						
						<p>
							<input class="button" name="submit" type="submit" value="Submit" />
						</p>
						
					</fieldset>
					
					<div class="clear"></div><!-- End .clear -->
					
				</form>
				
			</div> <!-- End #tab2 -->        
			
		</div> <!-- End .content-box-content -->
	</div>	
</div> <!-- End .content-box -->
	
<div class="clear"></div>
	
	
<?php require "footer.php";?>

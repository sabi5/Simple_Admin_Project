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
require "connection.php";
require "header.php";
require "sidebar.php";

if (isset($_POST['submit'])) {
    $ids = $_POST['product_id'];
    $pname= $_POST['name'];
    $pimage= $_POST['image'];
    $pprice= $_POST['price'];
    $pdescription= $_POST['description'];
    
    $insert = " UPDATE products SET
              name='$pname', image='$pimage', price='$pprice', description='$pdescription' WHERE product_id = '$ids' ";
    
    $uquery = mysqli_query($con, $insert);
    
    if ($uquery) {
        echo '<script>alert("Updated Successfully")</script>';
        ?>
        <script>location.replace("manageproducts.php")</script>
        <?php
    }
}

$id = $_GET['id'];
$query = "SELECT * FROM products WHERE product_id='$id'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$row = mysqli_fetch_assoc($result); 
if ($row) {
    $id= $row['product_id'];
    $name= $row['name'];
    $image= $row['image'];
    $price= $row['price'];
    $description= $row['description'];
} else {
    echo '<script> alert("No data found"); </script>';
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
			
				<form action="editproduct.php" method="post">
					
					<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
						<p>
							<label>ID</label>
							<input class="text-input small-input" type="text" id="small-input" name="product_id" value="<?php  echo $id; ?>" readonly/> <!-- Classes for input-notification: success, error, information, attention -->
							<br/>
						</p>
						<p>
							<label>Name</label>
							<input class="text-input small-input" type="text" id="small-input" name="name" value="<?php  echo $name;?>" required/> <!-- Classes for input-notification: success, error, information, attention -->
							<br/>
						</p>
							
						<p>
							<label>Price</label>
							<input class="text-input medium-input datepicker" type="number" id="medium-input" name="price" value="<?php  echo $price; ?>"  required/> 
						</p>
							
						<p>
							<label>Image</label>
							<input class="text-input large-input" type="file" id="large-input" name="image" value="<?php  echo $image; ?>"  required/>
						</p>
							
						<p>
							<label>Category</label>              
							<select name="category" class="small-input">
								<option value="1">Men</option>
								<option value="2">Women</option>
								<option value="3">Kids</option>
								<option value="4">Electronics</option>
								<option value="5">Sports</option>
							</select> 
						</p>
						<p>
							<label>Tags</label>
							<input type="checkbox" name="fashion" /> Fashion <input type="checkbox" name="ecommerce" /> Ecommerce <input type="checkbox" name="shop" /> Shop <input type="checkbox" name="handbag" /> Hand Bag <input type="checkbox" name="laptop" /> Laptop <input type="checkbox" name="headphone" /> Headphone
						</p>

						<p>
							<label>Description</label>
							<textarea class="text-input textarea wysiwyg" id="textarea" name="description" cols="79" rows="15" value="<?php  echo $description; ?>" ></textarea>
						</p>
							
						<p>
							<input class="button" name="submit" type="submit" value="UPDATE" />
						</p>
						
					</fieldset>
					
					<div class="clear"></div><!-- End .clear -->
					
				</form>
				
			</div> <!-- End #tab2 -->        
			
		</div> <!-- End .content-box-content -->
		
	</div> <!-- End .content-box -->

</div>	<!-- End Main Content Section with everything -->
<div class="clear"></div>

<?php require "footer.php";?>

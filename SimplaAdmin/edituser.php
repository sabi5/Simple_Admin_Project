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
    $id = $_POST['id'];
    $username= $_POST['username'];
    $password= $_POST['password'];
    $email= $_POST['email'];
    $role=$_POST['role'];

    $insert = " UPDATE users SET username = '$username', 
              password='$password', email='$email', role='$role' WHERE  user_id = '$id' ";
    
    $uquery = mysqli_query($con, $insert);
    
    if ($uquery) {
        echo '<script> alert("Updated successfully")</script>';
        ?>
        <script>location.replace("manageuser.php")</script>
        <?php
    }
}

$id = $_GET['id'];
$query = "SELECT *FROM users WHERE user_id='$id'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$row = mysqli_fetch_assoc($result); 
if ($row) {
    $username= $row['username'];
    $password= $row['password'];
    $email= $row['email'];
    $role= $row['role'];
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
			
			<div class="tab-content " id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
				
				<div class="notification attention png_bg">
					<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
					<div>
						This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross.
					</div>
				</div>
				
				<table>
					
					<thead>
						<tr>
							<th><input class="check-all" type="checkbox" /></th>
							<th>ID</th>
							<th>Username</th>
							<th>Email</th>
							<th>Role</th>
							<th>Action</th>
						</tr>
						
					</thead>
					
					<tfoot>
						<tr>
							<td colspan="6">
								<div class="bulk-actions align-left">
									<select name="dropdown">
										<option value="option1">Choose an action...</option>
										<option value="option2">Edit</option>
										<option value="option3">Delete</option>
									</select>
									<a class="button" href="#">Apply to selected</a>
								</div>
								
								<div class="pagination">
									<a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
									<a href="#" class="number" title="1">1</a>
									<a href="#" class="number" title="2">2</a>
									<a href="#" class="number current" title="3">3</a>
									<a href="#" class="number" title="4">4</a>
									<a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
								</div> <!-- End .pagination -->
								<div class="clear"></div>
							</td>
						</tr>
					</tfoot>
					
					<tbody>
						<tr>
							<td><input type="checkbox" /></td>
							<td>Lorem ipsum dolor</td>
							<td><a href="#" title="title">Sit amet</a></td>
							<td>Consectetur adipiscing</td>
							<td>Donec tortor diam</td>
							<td>
								<!-- Icons -->
									<a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
									<a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
									<a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
							</td>
						</tr>
						
						<tr>
							<td><input type="checkbox" /></td>
							<td>Lorem ipsum dolor</td>
							<td><a href="#" title="title">Sit amet</a></td>
							<td>Consectetur adipiscing</td>
							<td>Donec tortor diam</td>
							<td>
								<!-- Icons -->
									<a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
									<a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
									<a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
							</td>
						</tr>
						
						<tr>
							<td><input type="checkbox" /></td>
							<td>Lorem ipsum dolor</td>
							<td><a href="#" title="title">Sit amet</a></td>
							<td>Consectetur adipiscing</td>
							<td>Donec tortor diam</td>
							<td>
								<!-- Icons -->
									<a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
									<a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
									<a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
							</td>
						</tr>
						
						<tr>
							<td><input type="checkbox" /></td>
							<td>Lorem ipsum dolor</td>
							<td><a href="#" title="title">Sit amet</a></td>
							<td>Consectetur adipiscing</td>
							<td>Donec tortor diam</td>
							<td>
								<!-- Icons -->
									<a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
									<a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
									<a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
							</td>
						</tr>
						
						<tr>
							<td><input type="checkbox" /></td>
							<td>Lorem ipsum dolor</td>
							<td><a href="#" title="title">Sit amet</a></td>
							<td>Consectetur adipiscing</td>
							<td>Donec tortor diam</td>
							<td>
								<!-- Icons -->
									<a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
									<a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
									<a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
							</td>
						</tr>
						
						<tr>
							<td><input type="checkbox" /></td>
							<td>Lorem ipsum dolor</td>
							<td><a href="#" title="title">Sit amet</a></td>
							<td>Consectetur adipiscing</td>
							<td>Donec tortor diam</td>
							<td>
								<!-- Icons -->
									<a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
									<a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
									<a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
							</td>
						</tr>
						
						<tr>
							<td><input type="checkbox" /></td>
							<td>Lorem ipsum dolor</td>
							<td><a href="#" title="title">Sit amet</a></td>
							<td>Consectetur adipiscing</td>
							<td>Donec tortor diam</td>
							<td>
								<!-- Icons -->
									<a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
									<a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
									<a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
							</td>
						</tr>
						
						<tr>
							<td><input type="checkbox" /></td>
							<td>Lorem ipsum dolor</td>
							<td><a href="#" title="title">Sit amet</a></td>
							<td>Consectetur adipiscing</td>
							<td>Donec tortor diam</td>
							<td>
								<!-- Icons -->
									<a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
									<a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
									<a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
							</td>
						</tr>
					</tbody>
					
				</table>
				
			</div> <!-- End #tab1 -->
			
			<div class="tab-content default-tab" id="tab2">
			
				<form action="edituser.php" method="post">
					
					<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
						
						<p>
							<label>Username</label>
								<input class="text-input small-input" type="text" id="small-input" value="<?php  echo $username; ?>" name="username" readonly/> <!-- Classes for input-notification: success, error, information, attention -->
								<br />
						</p>
						
						<p>
						<label>Password</label>
								<input class="text-input small-input" type="password" id="small-input" value="<?php  echo $password; ?>" name="password" required/> <!-- Classes for input-notification: success, error, information, attention -->
								<br />
						</p>

						<p>
						<label>Re-Password</label>
								<input class="text-input small-input" type="password" id="small-input" name="re-password" required/> <!-- Classes for input-notification: success, error, information, attention -->
								<br />
						</p>
						
						<p>
						<label>Email</label>
								<input class="text-input small-input" type="email" id="small-input" value="<?php  echo $email; ?>" name="email" required/> <!-- Classes for input-notification: success, error, information, attention -->
								<br />
						</p>

						<p>
						<label>Role</label>
								<input class="text-input small-input" type="text" id="small-input" value="<?php  echo $role; ?>" name="role" required/> <!-- Classes for input-notification: success, error, information, attention -->
								<br />
						</p>
						
						<p>
						<input type="hidden" name="id" value="<?php  echo $id; ?>" 
			style="display:none;">
							<input class="button" name="submit" type="submit" value="Submit" />
						</p>
						
					</fieldset>
					
					<div class="clear"></div><!-- End .clear -->
					
				</form>
				
			</div> <!-- End #tab2 -->        
			
		</div> <!-- End .content-box-content -->
		
	</div> <!-- End .content-box -->

</div><!-- End Main Content Section with everything -->

<div class="clear"></div>
		
<?php require "footer.php";?>

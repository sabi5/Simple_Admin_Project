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
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['re-password'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    //$pass = password_hash($password, PASSWORD_BCRYPT);
    //$repass = password_hash($repassword, PASSWORD_BCRYPT);

    $emailquery = "SELECT * FROM users WHERE email='$email'";
    $query = mysqli_query($con, $emailquery);

    $emailcount = mysqli_num_rows($query);

    if ($emailcount > 0) {
        echo("<script>alert('Email already exists');</script>");
    } else {
        if ($password === $repassword) {
            $insertquery = "INSERT INTO users (username, password, email, role) 
							VALUES ('$username', '$password', '$email', '$role')";

            $iquery = mysqli_query($con, $insertquery);

            if ($iquery) {
                echo "<script>alert('New User Inserted Successful');</script>";
            } else {
                echo "<script>alert('Not inserted');</script>";

            }

        } else {
            echo("<script>alert('Password not matched');</script>");
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
			
			<h3>Add User</h3>
			
			<ul class="content-box-tabs">
				<li><a href="#tab1" >Manage</a></li> <!-- href must be unique and match the id of target div -->
				<li><a href="#tab2" class="default-tab">Add</a></li>
			</ul>
			
			<div class="clear"></div>
			
		</div> <!-- End .content-box-header -->
		
		<div class="content-box-content">

			<div class="tab-content default-tab" id="tab2">
			
				<form action="adduser.php" method="post">
					
					<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
						
						<p>
							<label>Username</label>
								<input class="text-input small-input" type="text" id="small-input" name="username" required/> <!-- Classes for input-notification: success, error, information, attention -->
								<br />
						</p>
						
						<p>
						<label>Password</label>
								<input class="text-input small-input" type="password" id="small-input" name="password" required/> <!-- Classes for input-notification: success, error, information, attention -->
								<br />
						</p>

						<p>
						<label>Re-Password</label>
								<input class="text-input small-input" type="password" id="small-input" name="re-password" required/> <!-- Classes for input-notification: success, error, information, attention -->
								<br />
						</p>
						
						<p>
						<label>Email</label>
								<input class="text-input small-input" type="email" id="small-input" name="email" required/> <!-- Classes for input-notification: success, error, information, attention -->
								<br />
						</p>

						<p>
						<label>Role</label>
								<input class="text-input small-input" type="text" id="small-input" name="role" required/> <!-- Classes for input-notification: success, error, information, attention -->
								<br />
						</p>
						
						<p>
							<input class="button" name="submit" type="submit" value="Submit" />
						</p>
						
					</fieldset>
					
					<div class="clear"></div><!-- End .clear -->
					
				</form>
				
			</div> <!-- End #tab2 -->        
			
		</div> <!-- End .content-box-content -->
		
	</div> <!-- End .content-box -->

</div> <!-- End Main Content Section with everything -->

<div class="clear"></div>

<?php require "footer.php";?>

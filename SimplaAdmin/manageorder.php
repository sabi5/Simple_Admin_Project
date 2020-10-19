<?php
   require "connection.php";
   require "header.php";
   require "sidebar.php";
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
	
	<div class="content-box" style='width :1200px';><!-- Start Content Box -->
		
		<div class="content-box-header" >
			
			<h3>Manage Orders</h3>
			
			<ul class="content-box-tabs">
				<li><a href="#tab1" class="default-tab">Manage</a></li> <!-- href must be unique and match the id of target div -->
				<!-- <li><a href="#tab2">Add</a></li> -->
			</ul>
			
			<div class="clear"></div>
			
		</div> <!-- End .content-box-header -->
		
		<div class="content-box-content">
			
			<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
			
				<table>
				<?php
				$sql="SELECT *FROM orders";
				$res = mysqli_query($con, $sql)or die($mysqli_error($con));
				if (mysqli_num_rows($res) >= 1) {
				}
				?> 
					<thead>
						<tr>
							<th><input class="check-all" type="checkbox" /></th>
							<th>Order_id</th>
							<th>User_id</th>
							<th>Cart_data</th>
							<th>Total</th>
							<th>Status</th>
							<th>Date_time</th>
							<!-- <th>Action</th> -->
						</tr>
						
					</thead>

					<?php
					while ($data = mysqli_fetch_array($res)) {

						echo "<tbody><tr><td><input type='checkbox' /></td>";
						echo "<td>" . "#" . $data["orderid"] . "</td>";
						echo "<td>" . "#" . $data["userid"] . "</td>";
						echo "<td>".$data["cartdata"] . "</td>";
						echo "<td>" . $data["total"] . "</td>";
						echo "<td>" . $data["status"] . "</td>";
						echo "<td>" . $data["datetime"] . "</td>";
						// echo "<td><a href='deleteproduct.php?id={$data['orderid']}' title='Delete'><img src='resources/images/icons/cross.png' 
						// 		alt='Delete'/></a></td></tr></tbody>";
						// echo "<td><a href='deleteproduct.php?id={$data['id']}'>
						//     Delete</a></td>";
						// echo "<td><a href='editproduct.php?id={$data['id']}'>Edit</a>
						//     </td></tr>";
					}
					?>
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
				</table>
				
			</div> <!-- End #tab1 -->
			
		</div> <!-- End .content-box-content -->
		
	</div> <!-- End .content-box -->
</div><!--  End Main Content Section with everything -->	
<div class="clear"></div>
	
<?php require "footer.php";?>

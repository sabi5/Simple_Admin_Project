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

$id = $_GET['id'];
$q = "DELETE FROM products WHERE product_id = $id";
mysqli_query($con, $q);

echo "<script>alert('Product Deleted Successfully');</script>";

?>
<script>location.replace("manageproducts.php")</script>

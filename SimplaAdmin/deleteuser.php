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
$q = "DELETE FROM users WHERE user_id = $id";
mysqli_query($con, $q);
echo '<script>alert("Account deleted Successfully")</script>';
?>
<script>location.replace("manageuser.php")</script>

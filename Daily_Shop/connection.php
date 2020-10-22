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
$username = "root";
$password = "";
$server = "localhost";
$db = "simple_admin";

$con = mysqli_connect($server, $username, $password, $db);

if ($con) {
    // echo "<script>alert('Connection Successful');</script>";
} else {
    echo "<script>alert('No Connection');</script>";
    die("no connection" . mysqli_connect_error());
}
?>
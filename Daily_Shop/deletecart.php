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

if (isset($_GET['action'])) {
    if ($_GET['action'] == "deleteproduct") {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            foreach ( $_SESSION['cart'] as $key=>$value) {
                if ($id == $_SESSION['cart'][$key]['product_id']) {
                    unset($_SESSION['cart'][$key]);
                    
                }
            }
        }
    }
}

echo "<script>alert('Product Deleted Successfully');</script>";
?>

<script>location.replace("cart.php")</script> 
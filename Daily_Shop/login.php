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

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username_search = "SELECT * FROM users where username = '$username'";
    $query = mysqli_query($con, $username_search);

    $username_count = mysqli_num_rows($query);

    if ($username_count) {
        $username_pass = mysqli_fetch_assoc($query);

        $db_pass = $username_pass['password'];
        $_SESSION['user_info'] = array('username'=>$username_pass['username'],
                    'id'=>$username_pass['user_id'], 'role'=>$username_pass['role']);
                    echo  $_SESSION['user_info'] ;

        if ($password==$db_pass) {
            // if ($_SESSION['user_info']['role']=='admin') {
            //     echo "<script>alert('Admin login successful');</script>";
            //     echo "<script>location.replace('admin/dashboard2.php');</script>";
            // } else {
            //     echo "<script>location.replace('user.php');</script>";
            // }
            echo "<script>location.replace('product.php');</script>";
            
        } else {
            echo "<script>alert('password Incorrect');</script>";
        }

    } else {
        echo "<script>alert('Invalid Username');</script>";
    }
}
?>




<!-- Login Modal -->  
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>
          <form class="aa-login-form" action="">
            <label for="">Username or Email address<span>*</span></label>
            <input type="text" name="username" placeholder="Username or email">
            <label for="">Password<span>*</span></label>
            <input type="password" name= "password" placeholder="Password">
            <input class="aa-browse-btn" name= "submit" type="submit" value="Login">
            <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
            <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
            <div class="aa-register-now">
              Don't have an account?<a href="account.html">Register now!</a>
            </div>
          </form>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
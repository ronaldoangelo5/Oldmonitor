<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
date_default_timezone_set('Asia/Makassar');
include('../inc/konek.php');

if (isset($_SESSION['iconmon'])){
    echo'<script language="javascript"> location.href ="'.$base_url.'/"; </script>';
}else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Login</title>

    <link href="../assets/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-reset.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet" />

</head>

  <body class="login-body">

    <div id="modalLogin" class="container">

      <form id="sign_in" method="POST" class="form-signin">
        <h2 class="form-signin-heading">sign in now</h2>
        <div id="pesan"></div>
        <div class="login-wrap">
            <div class="user-login-info">
                <input type="text" id="username" name="username" class="form-control" placeholder="User ID" autofocus>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
            </div>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
        </div>

          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="button">Submit</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->

      </form>

    </div>



    <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/bs3/js/bootstrap.min.js"></script>

    <script>
        $("#modalLogin").submit(kirim);
        function kirim(){
            username  = $("#username").val();
            password  = $("#password").val();
            //data = $(this).serializeArray();
            // fileeksekusi,data,output
            $.post("action_login.php",{olah:"data", username:username, password: password},function(output){
            $("#pesan").html(output);
            });
            return false;
        }
    </script>

  </body>
</html>
<?php
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login Form</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Welcome to Crowdfunding Website</h1>
      <form method="post" id="form-login">
        <p><input autofocus type="text" id="username" value="" placeholder="Username" required></p>
        <p><input type="password" id="password" value="" placeholder="Password" required></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="ck_rememberme" id="ck_rememberme">
            Remember me on this computer
          </label>
        </p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
    </div>

    <div class="login-help">
      <p>No user account? <a href="register.php">Click here to sign up</a>.</p>
    </div>
  </section>


    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.cookie.js"></script>
    <script src="assets/js/login.js"></script>
    <script type="text/javascript">
       $(document).ready(function(){
        if ($.cookie("rememberme") == "true") {
                $("#ck_rememberme").attr("checked", true);
                $("#username").val($.cookie("username"));
                $("#password").val($.cookie("password"));
            }
      });
    </script>

</body>
</html>

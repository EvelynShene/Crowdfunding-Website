<!DOCTYPE html>
 <html lang="en"> 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Sign up!</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <section class="container">
    <div class="register">
      <h1>Welcome to Crowdfunding Website</h1>
      <form method="post" id="form-register">
        <div class="form-group">
          <label class="control-label col-sm-4" for="name">Login Name:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control"  id="loginname" placeholder="Enter your loginname" required="">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="pwd">Password:</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" id="password" placeholder="Enter Password" required="">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-4" for="name">Nick Name:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control"  id="nickname" placeholder="Enter your nickname" required="">
          </div>
        </div>      
      
        <p class="submit">
          <input id="reg" type="submit" name="commit" value="register">
          <input id="regcancel" type="button" value="cancel">
        </p>
      </form>
    </div>

  </section>
    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/register.js"></script>
</body>
</html>

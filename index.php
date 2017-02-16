<?php include ('login.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Secret Diary</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Secret Diary</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <form class="navbar-form navbar-right" method="POST" >
        <div class="form-group">
          <input type="email" class="form-control" placeholder="Email" name="loginemail" id="loginemail" value="<?php echo @addslashes($_POST['loginemail']); ?>">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Password" name="loginpassword" value="<?php echo @addslashes($_POST['loginpassword']); ?>">
        </div>
        <button type="submit" class="btn btn-default" name="submit" value="Log In">Log In</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<br><br>
    <div class="container" style="text-align: center;">
      <div class="col-md-6 col-md-offset-3">
        <h1 style="margin-top: 25px">Secret Diary</h1>
        <p class="lead">Your own private diary, with you wherever you go</p>
        <p style="margin-top: 25px"><b>Interested? Sign Up</b></p>
      <?php if ($error) {?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
      <?php } ?>
      <?php if (@$message) {?>
        <div class="alert alert-success"><?php echo @$message; ?></div>
      <?php } ?>
          <form method="post" action="#" style="margin-top: 35px">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" value="<?php echo @addslashes($_POST['email']); ?>">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" value="<?php echo @addslashes($_POST['password']); ?>">
            </div>
            <input type="submit" name="submit" value="Sign Up" class="btn btn-success btn-lg" style="margin-top: 25px;">
          </form>
        
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 
    <script src="js/bootstrap.js"></script>
  </body>
</html>

<?php 
  include ('connection.php');
  session_start();
  $query = "SELECT diary from testing where id= '".$_SESSION['id']."' LIMIT 1 ";
  $result = mysqli_query($link,$query);
  $row = mysqli_fetch_array($result);
  $diary = $row['diary'];
?>
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
    <div class="navbar-header pull-left">
      <a class="navbar-brand" href="#">Secret Diary</a>
    </div>

      <ul class="navbar-nav nav pull-right">
        <li><a href="index.php?logout=1">Logout</a></li>
      </ul>
  </div><!-- /.container-fluid -->
</nav>
<br><br>
    <div class="container" style="text-align: center;">
      <div class="col-md-8 col-md-offset-2">
      <textarea class="form-control"><?php echo $diary; ?></textarea>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 
    <script src="js/bootstrap.js"></script>
    <script>
      $('textarea').css("height", $(window).height()-120);
      $('textarea').keyup(function() {
        $.post('updatediary.php',{diary: $('textarea').val()});
        console.log($('textarea').val());
      });
    </script>
  </body>
</html>

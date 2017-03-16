<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <!-- Bootstrap -->
  <link href="../../bower_components/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../src/css/login.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="dubai">

  <!-- codice login -->
  <div class="container">
    <div class="row">
      <div class="col-md-6 well col-md-offset-3" style="margin-top: 10%;" data-example-id="basic-forms">
        <!-- codice per gli errori-->
        <?php if(!empty($html)){ echo '<div class="alert alert-warning"   role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' . "<strong>Attenzione! &nbsp</strong>" .  $html . "</div>";}
        if(!empty($server_error)){echo '<div class="alert alert-warning"   role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' . "<strong>Attenzione! &nbsp</strong>" .  $server_error . "</div>";}?>
        <h1 class="col-sm-offset-4 col-sm-8">ACCEDI</h1>
        <form class="form-horizontal" method="post" action="codice_login.php" role="form">
          <div class="form-group col-sm-12">
            <label for="inputUser3" class="col-sm-2 control-label ">Userame</label>
            <div class="col-sm-10">
              <input type="text" name="user" class="form-control" id="inputUser3" required placeholder="Username">
            </div>
          </div>
          <div class="form-group col-sm-12">
            <label for="inputPassword3" class=" col-sm-2 control-label ">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12 ">
              <button type="submit" name="submit" class="btn btn-default col-sm-offset-8 col-sm-3 nero">Entra</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

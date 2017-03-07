<?php 
  // controllo accesso
  session_start();
  (empty($_SESSION["id"]) || $_SESSION["diritti"] != "s" ? header("location: ../login/") : "");
?>
<!DOCTYPE html>
<html lang="it">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Registro elettronico</title>
      <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
       <link rel="stylesheet" type="text/css" href="../vendor/datatables/datatables.min.css"/>
       <link rel="stylesheet" type="text/css" href="../src/css/style.css">

      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Registro Segreteria</a>
        </div>
  
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Firme<span class="sr-only">(current)</span></a></li>
            <li><a href="#">Statistiche</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right navbar--margin-right-none">
            <li><a href="#">Esci</a></li>
            <li class="dropdown">
              
              <button type="button" class="btn btn-default navbar-btn" aria-label="Left Align">
                  <span style="text-transform: capitalize;"><?php echo $_SESSION["utente"]; ?></span>
                  <span class="glyphicon glyphicon-user glyphicon--top-3" aria-hidden="true"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="col-md-12" >

      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#firma1" aria-controls="home" role="tab" data-toggle="tab">Firme oggi</a></li>
        <li role="presentation"><a href="#firmeora1" id="firmeora" aria-controls="home" role="tab" data-toggle="tab">Firme ora</a></li>
        <li role="presentation"><a href="#firma7g1" id="firme7g" aria-controls="home" role="tab" data-toggle="tab">Firme 7 giorni</a></li>
        <li role="presentation"><a href="#vecchie_firme1" id="vecchie_firme" aria-controls="profile" role="tab" data-toggle="tab">Vecchie Firme</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="firma1"> 
          <table id="tabella1" class="table table-striped table-bordered display nowrap" cellspacing="0" width="100%">
            <thead>
              <tr> 
                <th>id</th>
                <th>classe</th>
                <th>insegnante</th>
                <th>materia</th>
                <th>codice</th>
                <th>ora</th>
                <th>data</th>
                <th>assenti</th>
                <th>entrata</th>
                <th>uscita</th>
              </tr>
            </thead>
            <tfoot>
              <tr> 
                <th>id</th>
                <th>classe</th>
                <th>insegnante</th>
                <th>materia</th>
                <th>codice</th>
                <th>ora</th>
                <th>data</th>
                <th>assenti</th>
                <th>entrata</th>
                <th>uscita</th>
              </tr>
            </tfoot>
          </table>
          </div>
        <div role="tabpanel" class="tab-pane" id="vecchie_firme1">
          <table id="tabella2" class="table table-striped table-bordered display nowrap" cellspacing="0" width="100%">
            <thead>
              <tr> 
                <th>id</th>
                <th>classe</th>
                <th>insegnante</th>
                <th>materia</th>
                <th>codice</th>
                <th>ora</th>
                <th>data</th>
                <th>assenti</th>
                <th>entrata</th>
                <th>uscita</th>
              </tr>
            </thead>
            <tfoot>
              <tr> 
                <th>id</th>
                <th>classe</th>
                <th>insegnante</th>
                <th>materia</th>
                <th>codice</th>
                <th>ora</th>
                <th>data</th>
                <th>assenti</th>
                <th>entrata</th>
                <th>uscita</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="firma7g1">
          <table id="tabella3" class="table table-striped table-bordered display nowrap" cellspacing="0" width="100%">
            <thead>
              <tr> 
                <th>id</th>
                <th>classe</th>
                <th>insegnante</th>
                <th>materia</th>
                <th>codice</th>
                <th>ora</th>
                <th>data</th>
                <th>assenti</th>
                <th>entrata</th>
                <th>uscita</th>
              </tr>
            </thead>
            <tfoot>
              <tr> 
                <th>id</th>
                <th>classe</th>
                <th>insegnante</th>
                <th>materia</th>
                <th>codice</th>
                <th>ora</th>
                <th>data</th>
                <th>assenti</th>
                <th>entrata</th>
                <th>uscita</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="firmeora1">
          <table id="tabella4" class="table table-striped table-bordered display nowrap" cellspacing="0" width="100%">
            <thead>
              <tr> 
                <th>id</th>
                <th>classe</th>
                <th>insegnante</th>
                <th>materia</th>
                <th>codice</th>
                <th>ora</th>
                <th>data</th>
                <th>assenti</th>
                <th>entrata</th>
                <th>uscita</th>
              </tr>
            </thead>
            <tfoot>
              <tr> 
                <th>id</th>
                <th>classe</th>
                <th>insegnante</th>
                <th>materia</th>
                <th>codice</th>
                <th>ora</th>
                <th>data</th>
                <th>assenti</th>
                <th>entrata</th>
                <th>uscita</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
               

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script type="text/javascript" src="../vendor/jquery/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="../vendor/datatables/datatables.min.js"></script>
      <!-- include project js -->
      <script type="text/javascript" src="../src/js/segreteria.js"></script>
  </body>
</html>

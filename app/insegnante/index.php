<?php 
  // controllo accesso
  session_start();
  (empty($_SESSION["id"]) || $_SESSION["diritti"] != "i" ? header("location: ../login/") : "");
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
            <li class="active"><a href="#">Calendario<span class="sr-only">(current)</span></a></li>
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
        <li role="presentation" class="active"><a href="#calendario1" aria-controls="home" role="tab" data-toggle="tab">Oggi</a></li>
        <li role="presentation"><a href="#calendarioora1" id="calendarioora" aria-controls="home" role="tab" data-toggle="tab">Ora</a></li>
        <li role="presentation"><a href="#calendario7g1" id="calendario7g" aria-controls="home" role="tab" data-toggle="tab">7 giorni</a></li>
        <li role="presentation"><a href="#vecchio_calendario1" id="vecchio_calendario" aria-controls="profile" role="tab" data-toggle="tab">Vecchio</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="calendario1"> 
          <table id="tabella1" class="table table-striped table-bordered display nowrap" cellspacing="0" width="100%">
            <thead>
              <tr> 
	            <th>id</th>
	            <th>insegnante</th>
	            <th>classe</th>
	            <th>materia</th>
	            <th>codice</th>
	            <th>giorno</th>
	            <th>orario</th>
              </tr>
            </thead>
            <tfoot>
              <tr> 
                <th>id</th>
	            <th>insegnante</th>
	            <th>classe</th>
	            <th>materia</th>
	            <th>codice</th>
	            <th>giorno</th>
	            <th>orario</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="vecchio_calendario1">
          <table id="tabella2" class="table table-striped table-bordered display nowrap" cellspacing="0" width="100%">
            <thead>
              <tr> 
                <th>id</th>
	            <th>insegnante</th>
	            <th>classe</th>
	            <th>materia</th>
	            <th>codice</th>
	            <th>giorno</th>
	            <th>orario</th>
              </tr>
            </thead>
            <tfoot>
              <tr> 
                <th>id</th>
	            <th>insegnante</th>
	            <th>classe</th>
	            <th>materia</th>
	            <th>codice</th>
	            <th>giorno</th>
	            <th>orario</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="calendario7g1">
          <table id="tabella3" class="table table-striped table-bordered display nowrap" cellspacing="0" width="100%">
            <thead>
              <tr> 
                <th>id</th>
	            <th>insegnante</th>
	            <th>classe</th>
	            <th>materia</th>
	            <th>codice</th>
	            <th>giorno</th>
	            <th>orario</th>
              </tr>
            </thead>
            <tfoot>
              <tr> 
                <th>id</th>
	            <th>insegnante</th>
	            <th>classe</th>
	            <th>materia</th>
	            <th>codice</th>
	            <th>giorno</th>
	            <th>orario</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="calendarioora1">
          <table id="tabella4" class="table table-striped table-bordered display nowrap" cellspacing="0" width="100%">
            <thead>
              <tr> 
                <th>id</th>
	            <th>insegnante</th>
	            <th>classe</th>
	            <th>materia</th>
	            <th>codice</th>
	            <th>giorno</th>
	            <th>orario</th>
              </tr>
            </thead>
            <tfoot>
              <tr> 
                <th>id</th>
	            <th>insegnante</th>
	            <th>classe</th>
	            <th>materia</th>
	            <th>codice</th>
	            <th>giorno</th>
	            <th>orario</th>
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
      <!-- include your project -->
      <script type="text/javascript" src="../src/js/insegnante.js"></script>
  </body>
</html>

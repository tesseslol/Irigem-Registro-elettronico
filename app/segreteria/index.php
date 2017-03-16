<?php
// controllo accesso
session_start();
//(empty($_SESSION["id"]) || $_SESSION["diritti"] != "s" ? header("location: ../login/") : "");
?>
  <!DOCTYPE html>
  <html lang="it">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro elettronico</title>
    <!-- Bootstrap -->
    <link href="../../bower_components/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../bower_components/gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../bower_components/gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../../bower_components/gentelella/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet" />

    <!-- Custom Theme Style -->
    <link href="../../bower_components/gentelella/build/css/custom.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Registro Irigem</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../../bower_components/gentelella/production/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Nome Utente</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Dashboard</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../../bower_components/gentelella/production/images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="../../bower_components/gentelella/production/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="../../bower_components/gentelella/production/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="../../bower_components/gentelella/production/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="../../bower_components/gentelella/production/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="page-title">
              <div class="title_left">
                <h3>Users <small>Some examples to get you started</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="x_panel">
              <div class="x_title">
                <h2>Button Example <small>Users</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" style="margin-bottom:16px" role="tablist">
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
            </div>
          </div>
          </div>
          <!-- /page content -->

          <!-- footer content -->
          <footer>
            <div class="pull-right">
              Irigem - Registro elettronico dell'irigem</a>
            </div>
            <div class="clearfix"></div>
          </footer>
          <!-- /footer content -->
        </div>
      </div>




      <!-- jQuery -->
      <script src="../../bower_components/gentelella/vendors/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap -->
      <script src="../../bower_components/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- FastClick -->
      <script src="../../bower_components/gentelella/vendors/fastclick/lib/fastclick.js"></script>
      <!-- NProgress -->
      <script src="../../bower_components/gentelella/vendors/nprogress/nprogress.js"></script>
      <!-- iCheck -->
      <script src="../../bower_components/gentelella/vendors/iCheck/icheck.min.js"></script>
      <!-- Datatables -->
      <script src="../../bower_components/gentelella/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="../../bower_components/gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
      <script src="../../bower_components/gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
      <script src="../../bower_components/gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
      <script src="../../bower_components/gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
      <script src="../../bower_components/gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
      <script src="../../bower_components/gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
      <script src="../../bower_components/gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
      <script src="../../bower_components/gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
      <script src="../../bower_components/gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
      <script src="../../bower_components/gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
      <script src="../../bower_components/gentelella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
      <script src="../../bower_components/gentelella/vendors/jszip/dist/jszip.min.js"></script>
      <script src="../../bower_components/gentelella/vendors/pdfmake/build/pdfmake.min.js"></script>
      <script src="../../bower_components/gentelella/vendors/pdfmake/build/vfs_fonts.js"></script>

      <!-- Custom Theme Scripts -->
      <script src="../../bower_components/gentelella/build/js/custom.min.js"></script>
      <!-- include project js -->
      <script type="text/javascript" src="../src/js/segreteria.js"></script>

  </body>
</html>

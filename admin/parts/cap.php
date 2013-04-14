<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?=$web_name?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?=$url_static?>/bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
    <link href="<?=$url_static?>/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?=$url_static?>/css/style-admin.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?=$url_static?>/bootstrap/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=$url_static?>/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=$url_static?>/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=$url_static?>/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="<?=$url_static?>/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="<?=$url_static?>/ico/favicon.png">
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="index.php"><?=$web_name?></a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              <a class="btn" href="#"><i class="icon-user"></i> <?=$GLOBALS["user"]->email?></a>
              <a href="logout.php" class="btn btn-danger"><i class="icon-off icon-white"></i> Log Out</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="/admin/">Inicio</a></li>
              <li><a href="settings.php">Configuración</a></li>
              <li><a href="editTab.php">Añadir pestaña</a></li>
              <li><a href="imageManager.php">Gestor imagenes</a></li>
              <li><a href="/" target="_blank">WebApp</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row-fluid">
        <div class="span12">
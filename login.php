<?
session_start();

include_once $_SERVER['DOCUMENT_ROOT']."/class/includes.php";

if($_SESSION['user_loged']){
    header("Location: /admin/");
	exit();
}

$error = 0;

$username = $_REQUEST['user'];
$password = $_REQUEST['pwd'];

/*
$user = new User();
$user->username = "xxxx";
$user->email = "xxx@xx.com";
$user->password = "xxx";
$db = DB::getInstance();
$user = $db->set("users",$user->username,serialize($user));
exit;
*/
if($username && $password){
    try {
        $db = DB::getInstance();

        // Retrieve keys
        $user = unserialize($db->get('users',$username));

        if($user && $user->password == $password){
            $_SESSION['user_loged'] = serialize($user);
            header("Location: /admin/");
            exit;
        }
        $error = 1;
    }
    catch (Exception $e) {
        $error = 1;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Entrar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="<?=$url_static?>/bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="<?=$url_static?>/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="/bootstrap/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=$url_static?>/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=$url_static?>/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=$url_static?>/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="<?=$url_static?>/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="<?=$url_static?>/ico/favicon.png">
  </head>

  <body>

    <div class="container">
      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Entrar</h2>
        <? if($error == 1){?>
            <div class="alert alert-error">
                Username o password incorrecto...
            </div>
        <? } ?>
        <input type="text" name="user" class="input-block-level" value="<?=htmlentities($username)?>" placeholder="Usuari">
        <input type="password" name="pwd" class="input-block-level" placeholder="Password">
        <button class="btn btn-large btn-primary" type="submit">Enviar</button>
      </form>

    </div> <!-- /container -->

	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="<?=$url_static?>/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>

<?
session_start();

include_once $_SERVER['DOCUMENT_ROOT']."/class/includes.php";

if($_SESSION['user_loged']){
    header("Location: /admin/");
}

$error = 0;

$username = $_REQUEST['user'];
$password = $_REQUEST['pwd'];


if($username && $password){
    try {
        $db = $GLOBALS["database"]; 

        // Retrieve keys
        $user = $db->load('users')->get($username);
        
        if($user && $user["password"] == $password){
            $_SESSION['user_loged'] = $username;
            header("Location: /admin/");
            exit;
        }
        $error = 1;
    }
    catch (Exception $e) {
        echo "no trobat";
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

    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
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
    <link href="/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="/bootstrap/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="/ico/favicon.png">
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

    <script src="/bootstrap/js/jquery.js"></script>
    <script src="/bootstrap/js/bootstrap-min.js"></script>

  </body>
</html>

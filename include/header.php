<?php include "connect.php"; ?>
<?php
    include('db.php');

    $db = new DB();

    $categorys = $db->Query('SELECT * FROM lib_category');
    
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>CSS</title>
	<link rel="icon" type="images/png" href="images/logo-square.png">
	<link rel="stylesheet" type="text/css" href="style.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">


	<!--[if lt IE 9] >
   <script scr="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script scr="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> 
  <![endif] -->
</head>

<body class="bg">

<nav class="navbar navbar-expand-lg navbar-light  fixed-top navbar-dark" style="background-color: #232323;">
<a class="navbar-brand" href="#">
    <img src="images/logo-square.png" width="30" height="30" class="d-inline-block align-top" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php
      foreach($categorys as $category){ 
          $url=$category['url']? $category['url']:$category['name'];
          ?>
      <li class="nav-item">
        <a class="nav-link" href="<?=$url?>.php"><?=$category['name']?>&nbsp;</a>
      </li>
      <?php } ?>
      
    </ul>
  </div>
</nav>
<!--
<div class="head1 white" >
<span class="sort" style="background-color:#232323">
	<a href="#action" style="color: white">ACTION</a>
	<a href="#adventure" style="color: white">ADVENTURE</a>
	<a href="#strategy" style="color: white">STRATEGY</a>
	<a href="#rpg" style="color: white">ROLE PLAYING GAME/RPG</a>
	<a href="#simulation" style="color: white">SIMULATION</a>
	<a href="#sports" style="color: white">SPORTS</a>
	<a href="#racing" style="color: white">RACING</a></span>
</div>

<div >
<a href="./"><img class="lo" src="images/logo-square.png" width="80px" alt=""></a>
</div>
-->
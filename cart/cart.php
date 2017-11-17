<?php

session_start();
include "../include/db.php";
if(!isset($_SESSION["username"]) ||$_SESSION["username"] ==""){
	echo ('<script> alert("Not found any profile, Please login first."); window.location="signin/signin.php";</script>');
	return ;
}

$rootFolder = "/csshop/"; 
$db = new DB();
$pd = "SELECT * FROM product WHERE pid = ?";
$takenProduct = array ($pd);


if ($_GET["action"]=="add") {

	$pid = $_GET['pid'];

	$cart_item = array(
 		'pid' => $pid,
		'pname' => $_GET['pname'],
		'price' => $_GET['price'],
		
	);

	// ถ้ายังไม่มีสินค้าใดๆในรถเข็น
	if(empty($_SESSION['cart']))
    	$_SESSION['cart'] = array();
 
	// ถ้ามีสินค้านั้นอยู่แล้วให้บวกเพิ่ม
	if(array_key_exists($pid, $_SESSION['cart']))
		$_SESSION['cart'][$pid]['qty'] += $_POST['qty'];
 
	// หากยังไม่เคยเลือกสินค้นนั้นจะ
	else
	    $_SESSION['cart'][$pid] = $cart_item;



// ลบสินค้า
} else if ($_GET["action"]=="delete") {
	
	$pid = $_GET['pid'];
	unset($_SESSION['cart'][$pid]);
}
?>
<html>
<head>
	<title>cart</title>
	<link rel="icon" type="images/png" href="<?=$rootFolder?>images/logo-square.png">
	<link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style-c.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body >

<!--header-->

<form>
<br><br>
<center style="margin-top:7%;">
<h1 style="font-size:60px; font-family: 'Signika', sans-serif;">CART<h1>		
<table border="1" style="width:auto%; height:auto%; ">
		<td><center>Game In Cart</center></td>
		<td><center>Price</center></td>
		<td><center>Edit</center></td>
		
<?php 
	$sum = 0;
	foreach ($_SESSION["cart"] as $item) {
		$sum += $item["price"];
?>
<tr>
		<td><?=$item["pname"]?></td>
		<td><center><?=$item["price"]?></center></td>
		<td>
		<center>		
						
			<a href="?action=delete&pid=<?=$item["pid"]?>">ลบ</a>
			</center>	
		</td>
	</tr>
<?php } ?>
<tr><td colspan="3" align="right"> Total <?=$sum?> ฿</td></tr>
</table><br>
<span style="font-size:15px;">เสร็จสิ้นการเลือกสินค้า</span><br>
<ahref="<?=$rootFolder?>cart/pay.php"><button class="button"><span>submit</span></button></a>

</center>
</form>
<br>
<center><strong>กลับหน้าเลือกสินค้า</strong><a href="<?=$rootFolder?>category/?cat=1" style="color:#8B0000;" >  Click</a></center> <!--ใส้ลิ้งให้กูหน่อยยย -->
<br>
<img src="cart.png"  style="position:absolute; width:40%; left:28%; top:10%; z-index:-99;">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>
</html>
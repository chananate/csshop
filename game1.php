<!DOCTYPE html>
<?php
  $rootFolder = "//csshop/";  // ระบุ path ที่วาง program เช่น / , /csshop/ , /myproject/

  include('include/db.php');

  $db = new DB();
  $categorys = $db->Query('SELECT * FROM lib_category');
  $list = $db->Query('SELECT * FROM product');
  
?>
<?php include "connect.php"; ?>
<?php
        $fd = $pdo->prepare("SELECT * FROM product WHERE pid = ?"); // ดึงข้อมูล ต้องกำหนด ๅ เป็น ?
        $fd->bindParam(1, $_GET["pid"]); // น าค่า pid ทสี่ ง่ มากบั URL ก าหนดเป็นเงื่อนไข
        $fd->execute(); // เริ่มค ้นหา
        $row = $fd->fetch();
        ?>
<html>
<head>
  <meta charset="UTF-8">
  <title><?=$row['pname']?></title>
  <link rel="icon" type="images/png" href="images/logo-square.png">

  <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Fjalla+One|Josefin+Sans|News+Cycle|Oswald|Prompt|Roboto" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="<?=$rootFolder?>style-detail.css">
   


</head>
    <body>
    <section id="section01" class="teaser">
      <ul>
        <li>
        <a href="<?=$rootFolder?>category/?cat=<?=$row['category']?>" style="float:right; position:adsolute; z-index:99; color:#abc0cc; ">
        <span style="font-size:30pt; left:-530px; top:40px;">&#10094;</span></a></li>
        <li><img src= "<?=$rootFolder?>images/logo-square.png" width="50" style="padding-left:100%;position:static;"></li>
        <li class="a , E-font" style="padding-left:10%; position:fixed;"><?=$row["pname"]?></li>
      </ul>
      <div>
          <h1 class = "E-font"><?=$row["pname"]?></h1><br>

          <iframe style="margin-left:27%; top:140px; z-index: 4; position:absolute;" width="560" height="315" src="https://www.youtube.com/embed/<?=$row['pvideo']?>?&autoplay=0" frameborder="0" allowfullscreen ></iframe><br>
           <a href="<?=$rootFolder?>" style="left:90%; width:30px;">&#9962; </a>
          
           <a href="#section02"><span></span>DETAILS</a>
           <!--<p onclick="setSec2()"><span></span>DETAILS</p>-->
          </div>
    </section>
    <section id="section02" class="teaser">
      <img src="<?=$rootFolder?>/images/<?=$row['pid']?>.jpg" alt="" width=300px; style="position:absolution; z-index:9; float:right; margin-right:55px; margin-top:80px;">
          <h3 class = "T-font">รายละเอียด</h3><br><br><br><br><br><<br>
          <p class = "T-font" style="font-size:17px; letter-spacing:1px;">ชื่อสินค้า : <?=$row ["pname"]?><br>
          ราคา : <?=$row ["price"]?> บาท<br>
          รายละเอียดสินค้า <br>
          <?=$row ["pdetail"]?><br>
          ปีที่ผลิต : <?=$row ["psince"]?><br>
          ค่ายที่ผลิต : <?=$row ["pdevoloper"]?><br></p>
          <a href="#section01"><span></span>BACK</a>
    </section>

        </body>
    </html>

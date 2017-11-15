<?php include "connect.php" ?>
<?php
$stmt = $pdo->prepare("INSERT INTO product VALUES ('', ?, ?, ?, ?)");
$stmt->bindParam(1, $_POST["pname"]);
$stmt->bindParam(2, $_POST["address"]);
$stmt->bindParam(3, $_POST["email"]);
$stmt->bindParam(4, $_POST["password"]);
$stmt->execute(); // เริ่มเพิ่มข้อมูล
$pid = $pdo->lastInsertId(); // ขอคยี ห์ ลกัทเี่ พมิ่ สา เร็จ
?>
<html>
<head><meta charset="UTF-8"></head>
<body>
completed!!your ID is <?=$pid?>
</body>
</html>

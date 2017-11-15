
<?php
include "../connect.php";

if(trim($_POST["username"]) == ""){	
alert("Please input Username!");
exit();
}

if(trim($_POST["password"]) == ""){
echo "Please input Password!";
exit();
}  

if($_POST["password"] != $_POST["conpassword"]){
echo "Password not Match!";
exit();
}

if(trim($_POST["name"]) == ""){
echo "Please input Name!";
exit();
}  

if($_POST["email"] ==""){
	echo "Please input Name!";
	exit();
	}

	if($_POST["address"] ==""){
		echo "Please input Address!";
		exit();
		}

		if($_POST["province"] ==""){
			echo "Please input Province!";
			exit();
			}

			if($_POST["code"] ==""){
				echo "Please input Postal Code!";
				exit();
				}

				$stmt = $pdo->prepare("INSERT INTO customer VALUES ( ?, ?, ?, ?, ?, ?, ?,'')");
				$stmt->bindParam(1, $_POST["name"]);
				$stmt->bindParam(2, $_POST["username"]);
				$stmt->bindParam(3, $_POST["e-mail"]);
				$stmt->bindParam(4, md5($_POST["password"]));
				$stmt->bindParam(5, $_POST["address"]);
				$stmt->bindParam(6, $_POST["province"]);
				$stmt->bindParam(7, $_POST["code"]);
				
				$stmt->execute(); // เริ่มเพิ่มข้อมูล
				$pid = $pdo->lastInsertId(); // ขอคยี ห์ ลกัทเี่ พมิ่ สา เร็จ
					
					echo "Register Completed!=$pid<br>";
				
					echo "<br> Go to <a href='../signin/signin.php'>Login page</a>";
					
				
			
/*$stmt = $pdo->prepare("INSERT INTO customer VALUES('', ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bindParam(1, $_POST["name"]);
	$stmt->bindParam(2, $_POST["username"]);
	$stmt->bindParam(3, $_POST["e-mail"]);
	$stmt->bindParam(4, $_POST["password"]);
	$stmt->bindParam(5, $_POST["address"]);
	$stmt->bindParam(6, $_POST["province"]);
	$stmt->bindParam(7, $_POST["postal code"]);
	$stmt->execute(); // เริ่มเพิ่มข้อมูล
	$pid = $pdo->lastInsertId(); // ขอคยี ห์ ลกัทเี่ พมิ่ สา เร็จ*/
?>
<html>
<head><meta charset="UTF-8"></head>
<body>
</body>
</html>
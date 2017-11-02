<?php include "include/header.php"; ?>
<div class="row">

	<?php
$stmt = $pdo->prepare("SELECT product.*,lib_category.name AS category_name FROM product LEFT JOIN lib_category ON product.category=lib_category.code");
$stmt->execute();
while ($row = $stmt->fetch()) { ?>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="border-width: 1px">
		<?=$row['pid'];?>
		<br><?=$row['pname'];?>
		<br><?=$row['category_name'];?>
	</div>

<?php }
?>

<?php include "include/footer.php"; ?>
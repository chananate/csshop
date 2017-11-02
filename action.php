<?php include "include/header.php"; ?>
<?php
    include('include/db.php');

    $db = new DB();

    $rows = $db->Query('SELECT product.*,lib_category.name AS category_name FROM product LEFT JOIN lib_category ON product.category=lib_category.code');
    
?>
<br>
<<br>
<<br>
<div class="row">

	<?php
foreach($rows as $row){ ?>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="border-width: 1px; color:white;">
		<?=$row['pid'];?>
		<br><?=$row['pname'];?>
		<br><?=$row['category_name'];?>
	</div>

<?php }
?>

<div class="bg" style="height:400px">
	
</div>
<?php include "include/footer.php"; ?>





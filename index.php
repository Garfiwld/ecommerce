<?php
require_once 'core/init.php';
include 'includes/head.php';
include 'includes/navigation.php';
include 'includes/slide.php';

if (isset($_GET['brand'])) {
	$brand_id = (int) $_GET['brand'];
	$sql = "SELECT * FROM `products` WHERE `brand` = '{$brand_id}' ";
}else{
	$sql = 'SELECT * FROM `products`';
}
$featured = $db->query($sql);
?>

    <div class="container">
		<hr>
		<h2 class="text-center">สินค้า</h2>
		<hr>
		<div class="row">
			<?php while ($product = mysqli_fetch_assoc($featured)): ?>
				<div class="col-sm-3 mt-1">
					<div class="card shadow mb-4 bg-white">
						<img class="img-thumb" src="<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>">
						<div class="card-body">
							<h6 class="card-title"><?php echo $product['title']; ?></h6>
							<p class="des-thumb"><?php echo $product['description']; ?></p>
							<h5 class='price'><?php echo $product['price']; ?>฿<h5>
						</div>
						<div class="card-footer text-center">
							<a href="#" class="col-12 mx-auto btn btn-success">ซื้อ</a>
						</div>
					</div>
				</div>
			<?php endwhile;?>
		</div>
	</div>

<?php
include 'includes/footer.php';
?>
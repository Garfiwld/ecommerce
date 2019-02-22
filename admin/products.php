<?php
require_once '../core/init.php';
include 'includes/admin.php';
include 'includes/head.php';
include 'includes/navigation.php';
$sql = 'SELECT * FROM `products`';
$featured = $db->query($sql);


// เพิ่ม-แก้ไข
if (isset($_GET['add']) || isset($_GET['edit'])) {
    $brandQuery = $db->query("SELECT * FROM brand ORDER BY brand");
    $title = '';
    $brand = '';
	$description = '';
	$price = '';
//ดึงข้อมูลเดิม
    if (isset($_GET['edit'])) {
        $edit_id = (int) $_GET['edit'];
        $productResults = $db->query("SELECT * FROM products WHERE id = '{$edit_id}'");
        $product = mysqli_fetch_assoc($productResults);
        $title = $product['title'];
        $brand = $product['brand'];
        $price = $product['price'];
        $description = $product['description'];
        $dbpath = $product['image'];
    }

    if ($_POST) {
        $title = $_POST['title'];
        $brand = $_POST['brand'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        // เปลี่ยนชื่อรูป
        if (!empty($_FILES)) {
            var_dump($_FILES);
            $photo = $_FILES['photo'];
            $name = $photo['name'];
            $nameArray = explode('.', $name);
            $fileExt = $nameArray[1];
            $tmpLoc = $photo['tmp_name'];
            $uploadName = md5(microtime()) . '.' . $fileExt;
            $uploadPath = $_SERVER['DOCUMENT_ROOT'].'/ecommerce/images/products/' . $uploadName;
            $dbpath = '/ecommerce/images/products/' . $uploadName;
        }

		move_uploaded_file($tmpLoc, $uploadPath);

		if (isset($_GET['add'])) {
			$insertSql = "INSERT INTO `products` (`id`, `title`, `brand`, `image`, `description`, `price`) VALUES (NULL, '{$title}', '{$brand}', '{$dbpath}', '{$description}', '{$price}')";
		}
		
        if (isset($_GET['edit'])) {
            $edit_id = (int) $_GET['edit'];
            $insertSql = "UPDATE `products` SET `title`='{$title}',`brand`='{$brand}',`price`='{$price}',`image`='{$dbpath}',`description`='{$description}' WHERE `id`= '{$edit_id}'";
		}
		
        $db->query($insertSql);
        header("Location: products.php");
    }
    ?>
	<div class="container">
		<hr>
		<h2 class="text-center"><?php echo ((isset($_GET['edit'])) ? 'แก้ไข' : 'เพิ่ม'); ?>สินค้า</h2>
		<hr>

			<form class="form" action="products.php?<?php echo ((isset($_GET['edit'])) ? 'edit=' . $edit_id : 'add=1'); ?>" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="form-group col-12">
					<label for="title" class="col-form-lable">Title*:</label>
					<input class="form-control" type="text" name="title" id="title" value="<?php echo $title; ?>" required>
				</div>

				<div class="form-group col-6">
					<label for="brand" class="col-form-lable">Brand*:</label>
					<select class="form-control" name="brand" id="brand" required>
						<option value=""<?php echo (($brand == '') ? ' selected' : ''); ?>></option>
						<?php while ($b = mysqli_fetch_assoc($brandQuery)): ?>
						<option value="<?php echo $b['id']; ?>"<?php echo (($brand == $b['id']) ? ' selected' : ''); ?>><?php echo $b['brand']; ?></option>
						<?php endwhile;?>
					</select>
				</div>

				<div class="form-group col-3">
					<label for="title" class="col-form-lable">Price*:</label>
                    <input class="form-control" type="text" placeholder="0.00" required name="price" min="0" value="<?php echo $price; ?>" pattern="^\d+(?:\.\d{1,2})?$">
				</div>

				<div class="form-group col-3">
					<label for="photo"  class="col-form-lable">Product Photo:</label>
					<input type="file" class="form-control-file"  name="photo" id="photo" required>
				</div>

				<div class="form-group col-12">
					<label for="description">Description</label>
					<textarea class="form-control" name="description" id="description" rows="3" required><?php echo $description; ?></textarea>
				</div>

				<div class="form-group mx-auto">
					<a class="btn btn-primary" href="products.php">Cancel</a>
					<input class="btn btn-success" type="submit" value="<?php echo ((isset($_GET['edit'])) ? 'Edit' : 'Add'); ?> Product">
				</div>

				<div class="clearfix"></div>
				</div>
			</form>


		</div>
	<!-- </div> -->


<!-- ลบสินค้า -->
<?php
} else {
    if (isset($_GET['delete'])) {
        $delete_id = (int) $_GET['delete'];
        $db->query("DELETE FROM `products` WHERE `products`.`id` = $delete_id");
        header('Location: products.php');
    }
?>

<!-- หน้าปกติ -->
	<hr>
    <div class="container">
	<h2 class="text-center">สินค้า</h2>
	<hr>
    <div class="clearfix"></div>
		<div class="row">
			<?php while ($product = mysqli_fetch_assoc($featured)): ?>
				<div class="col-sm-3 mt-1">
				<div class="card shadow mb-4 bg-white">
					<img class="img-thumb" src="<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>">
						<div class="card-body">
							<h5 class="card-title"><?php echo $product['title']; ?></h5>
							<p class="des-thumb"><?php echo $product['description']; ?></p>
							<h5 class='price'><?php echo $product['price']; ?>฿<h5>
						</div>
						<div class="card-footer text-center row">
                            <a class="col-8 btn btn-warning" href="products.php?edit=<?php echo $product['id']; ?>"><i class="fas fa-edit"></i> แก้ไข</a>
                            <a class="col-4 btn btn-danger" href="products.php?delete=<?php echo $product['id']; ?>"><i class="fas fa-trash-alt"></i> ลบ</a>
                        </div>
					</div>
				</div>
			<?php endwhile;?>
		</div>
	</div>


<?php }
include 'includes/footer.php';
?>
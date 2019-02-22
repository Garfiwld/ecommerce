<?php
require_once '../core/init.php';
include 'includes/admin.php';
include 'includes/head.php';
include 'includes/navigation.php';

$results = $db->query('SELECT * FROM brand ORDER BY brand');

// Edit brand
if (isset($_GET['edit']) && !empty($_GET['edit'])) {
    $edit_id = (int) $_GET['edit'];
    $edit_result = $db->query("SELECT * FROM brand WHERE id = '{$edit_id}'");
    $eBrand = mysqli_fetch_assoc($edit_result);
}

// Delete brand
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $delete_id = (int) $_GET['delete'];
    $db->query("DELETE FROM brand WHERE id = '{$delete_id}'");
    header('Location: brands.php');
}

if (isset($_POST['add_submit'])) {
    // Add brand to database
    $brand = $_POST['brand'];
    $sql = "INSERT INTO brand (brand) VALUES ('$brand')";
    if (isset($_GET['edit'])) {
        $sql = "UPDATE brand SET brand = '{$brand}' WHERE id = '{$edit_id}'";
    }
    $db->query($sql);
    header('Location: brands.php');
}
?>
<div class="container">
	<hr>
	<h2 class="text-center">แบรนด์</h2>
	<hr>

	<div class="form-row">
		<div class="form-group mx-auto">
			<form class="form-inline" action="brands.php<?php echo (isset($_GET['edit'])) ? '?edit=' . $edit_id : ''; ?>" method="post">
				<div class="form-group">
					<?php
                        $brand_value = '';
                        if (isset($_GET['edit'])) {
                            $brand_value = $eBrand['brand'];
                        }
                    ?>
					<input class="form-control" type="text" name="brand" id="brand" value="<?php echo $brand_value; ?>" required>
                    <!-- ปุ่ม Cancel หลังกดปุ่ม Edit -->
					<?php if (isset($_GET['edit'])): ?>
						<a class="btn btn-primary" href="brands.php"><i class="fas fa-times"></i> ยกเลิก</a>
					<?php endif;?>
                    <!-- \ปุ่ม Cancel หลังกดปุ่ม Edit -->
					<input class="btn btn-success" type="submit" name="add_submit" value="<?php echo (isset($_GET['edit'])) ? 'แก้ไข' : 'เพิ่ม'; ?>แบรนด์">
				</div>
			</form>
		</div>
	</div>

	<hr>
    <div class="row">
        <div class="mx-auto">
            <table class="table table-bordered table-hover table-responsive">
                <thead>
                    <th>แบรนด์</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </thead>
                <tbody>
                    <?php while ($brand = mysqli_fetch_assoc($results)): ?>
                    <tr>
                        <td><?php echo $brand['brand']; ?></td>
                        <td><a class="btn btn-warning" href="brands.php?edit=<?php echo $brand['id']; ?>"><i class="fas fa-edit"></i> แก้ไข</a></td>
                        <td><a class="btn btn-danger" href="brands.php?delete=<?php echo $brand['id']; ?>"><i class="fas fa-trash-alt"></i> ลบ</a></td>
                    </tr>
                    <?php endwhile;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include 'includes/footer.php';
?>
}
?>
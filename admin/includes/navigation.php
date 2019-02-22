<div class="pb-5">

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="index.php"><i class="fas fa-shopping-cart"></i> Satorn Shop</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
				<a class="nav-link" href="brands.php">แบรนด์ </a>
				</li>
				<li class="nav-item active">
				<a class="nav-link" href="products.php">สินค้า</a>
				<li class="nav-item active">
				<a class="nav-link" href="products.php?add=1">เพิ่มสินค้า</a>
				</li>
			</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i> ยินดีต้อนรับคุณ <?php echo $_SESSION['Name']; ?>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="../edit_profile.php"><i class="fas fa-user-edit"></i> แก้ไขข้อมุลส่วนตัว</a>
						<?php if ($_SESSION['Status'] == "ADMIN") {?>
							<a class="dropdown-item" href="index.php"><i class="fas fa-user-shield"></i> หน้าผู้ดูแลระบบ</a>
						<?php }?>
						<div class='dropdown-divider'></div>
						<a class="dropdown-item" href="../logout.php"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>

</div>
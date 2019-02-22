<?php
	$bquery = $db->query("SELECT * FROM brand ORDER BY brand");
?>

<div class="pb-5">
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="index.php"><i class="fas fa-shopping-cart"></i> Satorn Shop</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item dropdown active">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						แบรนด์
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<?php while($child = mysqli_fetch_assoc($bquery)) : ?>
							<a class="dropdown-item" href="index.php?brand=<?php echo $child['id']; ?>"><?php echo $child['brand']; ?></a>
							<?php endwhile; ?>
						</div>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">
					<?php if (isset($_SESSION['UserID'])) { ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i> ยินดีต้อนรับคุณ <?php echo $_SESSION['Name']; ?>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="edit_profile.php"><i class="fas fa-user-edit"></i> แก้ไขข้อมุลส่วนตัว</a>
							<?php if ($_SESSION['Status'] == "ADMIN") {?>
								<a class="dropdown-item" href="admin/index.php"><i class="fas fa-user-shield"></i> หน้าผู้ดูแลระบบ</a>
							<?php } ?>
							<div class='dropdown-divider'></div>
							<a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
							</div>
						</li>
					<?php }else{ ?>
						<li class="nav-item">
						<a class="btn btn-success" href="reg.php"><i class="fas fa-registered"></i> สมัครสมาชิก</a>
						<a class="btn btn-primary" href="login.php"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</a>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>
</div>
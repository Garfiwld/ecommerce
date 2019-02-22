<?php
    require_once 'core/init.php';
    include 'includes/head.php';
    include 'includes/navigation.php';
if(isset($_POST['submit'])){

	if($_POST["txtPassword"] != $_POST["txtConPassword"])
	{
        echo '<script> alert("Password not Match!")</script>';
    }else{    
        $sql = "SELECT * FROM `member` WHERE `Username` = '".$_POST["txtUsername"]."' ";
        $result = $db->query($sql);
        if($result->num_rows > 0){
            echo '<script> alert("Username already exists!")</script>';
        }
        else
        {	
            
            $strSQL = "INSERT INTO `member` (`UserID`, `Username`, `Password`, `Name`, `Status`) VALUES (NULL, '".$_POST["txtUsername"]."', '".$_POST["txtPassword"]."', '".$_POST["txtName"]."', 'USER')";
            $db->query($strSQL);
            echo '<script> alert("Register Completed!")</script>';
            header('Refresh:0 url=index.php');
        }
    }
}
?>

<div class="container">
        <div class="row">
            <div class="col-8 mx-auto mt-5">
                <div class="card">
                    <form action="" method="POST">
                        <div class="card-header text-center">
                        <h4> แก้ไขข้อมูลส่วนตัว </h2>
                        </div>
                        <div class="card-body">
                                <div class="form-group">
                                    <label class="col-form-label"for="name">Name</label>
                                    <input class="form-control"type="text" id="name" name="txtName" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Username</label>
                                    <input class="form-control"type="text" id="name" name="txtUsername" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="password">Password</label>
                                    <input class="form-control" type="password" id="password" name="txtPassword" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="password">Confirm Password</label>
                                    <input class="form-control" type="password" id="passwordCon" name="txtConPassword" required>
                                </div>
                        </div>
                        <div class="card-footer text-center">
                            <input name="submit" id="submit" class="btn btn-success" type="submit" value="สมัครสมาชิก">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include 'includes/footer.php';
?>
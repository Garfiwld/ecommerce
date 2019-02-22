<?php
    require_once 'core/init.php';
    include 'includes/head.php';
    include 'includes/navigation.php';

    $session = $_SESSION['UserID'];

    if(isset($_POST['submit'])){
        $pw = $_POST['password'];
        $name = $_POST['name'];
        if($_POST["password"] != $_POST["passwordCon"])
        {
            echo "Password not Match!";
            exit();
        }
        $strSQL = "UPDATE `member` SET Password = '".$pw."' 
        , Name = '".$name."' WHERE UserID = '".$session."' ";
        
        $_SESSION['Name'] = $_POST['name'];
        $db->query($strSQL);
        echo '<script> alert("Save Completed!")</script>';
        header('Refresh:0 url=#');
    }

    $result = $db->query("SELECT * FROM member WHERE UserID = '".$session."' ");
    $objResult = $result->fetch_assoc();
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
                                    <label class="col-form-label">Username</label>
                                    <input class="form-control"type="text" id="name" name="name" value="<?php echo $objResult["Username"];?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="password">Password</label>
                                    <input class="form-control" type="password" id="password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="password">Confirm Password</label>
                                    <input class="form-control" type="passwordCon" id="passwordCon" name="passwordCon" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label"for="name">Name</label>
                                    <input class="form-control"type="text" id="name" name="name" value="<?php echo $objResult["Name"];?>" required>
                                </div>
                        </div>
                        <div class="card-footer text-center">
                            <input name="submit" id="submit" class="btn btn-success" type="submit" value="แก้ไข">
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
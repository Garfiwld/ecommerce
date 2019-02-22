<?php
    require_once 'core/init.php';
    include 'includes/head.php';
    include 'includes/navigation.php';
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $db->real_escape_string($_POST['password']);
        $sql = "SELECT * FROM `member` WHERE `Username` = '".$username."' AND `Password` = '".$password."'";
        $result = $db->query($sql);
        if($result->num_rows == 0)
        {
             echo '<script> alert("Username and Password Incorrect!")</script>';
        }
        else
        {
            $row = $result->fetch_assoc();
            echo print_r($row);
            $_SESSION['UserID'] = $row['UserID'];
            $_SESSION['Name'] = $row['Name'];
            $_SESSION['Status'] = $row['Status'];
            
            if($row["Status"] == "ADMIN")
            {
                header("location:admin/index.php");
            }
            else
            {
                header("location:index.php");
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
                        <h4> Login </h2>
                        </div>
                        <div class="card-body">
                                <div class="form-group">
                                    <label class="col-form-label"for="username">Username</label>
                                    <input class="form-control"type="text" id="username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="password">Password</label>
                                    <input class="form-control" type="password" id="password" name="password">
                                </div>
                        </div>
                        <div class="card-footer text-center">
                            <input name="submit" id="submit" class="btn btn-success" type="submit" value="Login" required>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
    include 'includes/footer.php';
?>
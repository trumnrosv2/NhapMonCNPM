<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/chung.css">
    <link rel="stylesheet" href="css/rigister.css">
</head>
<body>
    <div class="khung_account">
        <?php include 'header.php';?>
        <div class="khoi_chung_dn_dk">
                <p>ĐĂNG KÝ TÀI KHOẢN</p>
        </div>
        <div class="lg_rg">
            <div><button class="btn" id="btn_lg">Đăng nhập</button></div>
            <div><button  class="btn" id="btn_rg">Đăng ký</button></div>
        </div>
        
       
        <!-- <div class="check_valid ></div> -->
        
        <div class="div_form">
            <form action="" method="post">
                <div class="chung">
                    <p style="margin-bottom: 10px; font-family: 'Source Sans Pro', sans-serif;">HỌ</p>
                    <input style="padding: 5px 0px;"type="text" placeholder="Nhập họ" name="firstname" value="<?php echo isset($_POST["firstname"]) ? $_POST["firstname"] : ''; ?>">

                </div>
                <div class="chung">
                    <p style="margin-bottom: 10px; font-family: 'Source Sans Pro', sans-serif;">TÊN</p>
                    <input style="padding: 5px 0px;" type="text" placeholder="Nhập tên" name="lastname" value="<?php echo isset($_POST["lastname"]) ? $_POST["lastname"] : ''; ?>">
                </div>
                <div class="chung">
                    <p style="margin-bottom: 10px; font-family: 'Source Sans Pro', sans-serif;">SỐ ĐIỆN THOẠI</p>
                    <input style="padding: 5px 0px;" type="text" placeholder="Nhập số điện thoại" name="sdt" value="<?php echo isset($_POST["sdt"]) ? $_POST["sdt"] : ''; ?>">
                </div>
                <div class="chung">
                    <p style="margin-bottom: 10px; font-family: 'Source Sans Pro', sans-serif;">EMAIL</p>
                    <input style="padding: 5px 0px;" type="email" placeholder="Nhập địa chỉ email" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
                </div>
                <div class="chung">
                    <p style="margin-bottom: 10px; font-family: 'Source Sans Pro', sans-serif;">NHẬP MẬT KHẨU</p>
                    <input style="padding: 5px 0px;" type="password" placeholder="Nhập mật khẩu" name="password" value="<?php echo isset($_POST["password"]) ? $_POST["password"] : ''; ?>">
                </div>
                <div class="chung">
                    <input type="submit" name="rigister" id="rigister" value="ĐĂNG KÝ" style="background-color: #000000; color: #FFFFFF;font-size: 15px;
                    padding: 5px 10px;" >
                </div>
                
                
            </form>
        </div>
       

      
        <button id="myButton"  >Hỗ trợ sự cố</button>
        <?php include 'footer.php';?>

       </div>

    </div>
    <script>
        var btn_lg = document.getElementById("btn_lg");
        btn_lg.addEventListener("click", function() {
            window.location.href = "login.php";
        });
    </script>
    <?php
        // session_start();
        include 'connectDB.php';
        $loginMessage = ""; 
        $divClass = "";
        function isValidPhoneNumber($phoneNumber) {
            if (strlen($phoneNumber) === 10) {
                if (substr($phoneNumber, 0, 1) === '0' && is_numeric($phoneNumber)) {
                    return true;
                }
            }
            return false;
        }
           if(isset($_POST["rigister"])){
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $sdt =$_POST["sdt"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            if($firstname=="" || $lastname=="" || $sdt=="" || $email=="" || $password==""){
                echo "<script>alert('Hãy nhập đủ thông tin của bạn!')</script>";
                return;
            }
            if(!isValidPhoneNumber($sdt)){
                echo "<script>alert('Số điện thoại không hợp lệ!')</script>";
                // $loginMessage = "Số điện thoại không hợp lệ!";
                // $divClass = "failure";
                return;
            }

            $check_query_admin = $conn->query("SELECT * FROM users WHERE email = 'admin@gmail.com'");
            if($check_query_admin->num_rows == 0){
                $hashedPassword_AD = md5("123456a");
                $conn->query("INSERT INTO users (first_name,last_name,hashpassword,email,sdt,password_user)
                VALUES('admin','nro','$hashedPassword_AD','admin@gmail.com','0123456789','123456a' ) ");
            }
            $check_query_email = $conn->query("SELECT * FROM users WHERE email = '$email'");
            //print_r($check_query_email);
            $check_query_sdt = $conn->query("SELECT * FROM users WHERE sdt = '$sdt'");
            if($check_query_email->num_rows > 0){
                echo "<script>alert('Email này đã tồn tại!')</script>";
                $loginMessage = "Email này đã tồn tại!";
                $divClass = "failure";
                return;
            }
            if($check_query_sdt->num_rows > 0){
                echo "<script>alert('Số điện thoại này đã được đăng ký!')</script>";
                // $loginMessage = "Số điện thoại này đã được đăng ký!";
                // $divClass = "failure";
                return;
            }
            
            $hashedPassword = md5($password);
            // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                //setcookie("userLogInNow", $username, time() + 3600, "/"); //
                $sql_insert = $conn->query("INSERT INTO users (first_name,last_name,hashpassword,email,sdt,password_user)
                VALUES('$firstname','$lastname','$hashedPassword','$email','$sdt','$password' ) ");
                 if ($sql_insert) {
                    echo "<script>alert('Đăng ký thành công.')</script>";
                    $_SESSION['inforloginnow'] = array(
                    'sdt' => $sdt,
                    'email' => $email
                    
                    );
                    // if(isset($_SESSION["inforloginnow"])){
                    //     session_destroy();
                    // }
                    header("Location: index.php");
                } 

        }


    ?>
</body>
</html>
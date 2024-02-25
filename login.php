
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/chung.css">
    <link rel="stylesheet" href="css/login.css">
    <style>
       
        
    </style>
</head>
<body>
        <div class="khung_account">
        <?php include 'header.php';?>
            <div class="khoi_chung_dn_dk">
                    <p>ĐĂNG NHẬP TÀI KHOẢN</p>
            </div>
            <div class="lg_rg">
                <div><button class="btn" id="btn_lg" name="btn_lg"></a>Đăng nhập</button></div>
                <div><button  class="btn" id="btn_rg" name="btn_rg"> Đăng ký</button></div>
            </div>
            <?php

include 'connectDB.php';
$loginMessage = ""; 
$divClass = "";
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

     
    if (empty($email) || empty($password)) {
        echo "<script>alert('Hãy nhập đủ thông tin của bạn!')</script>";
    } else {
        $stmt = $conn->prepare("SELECT hashpassword FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            echo "<script>alert('Email không tồn tại!')</script>";
        } else {
            $row = $result->fetch_assoc();
            //print_r($row);
            $passUser = $row["hashpassword"];
           
            if ( md5($password)==$passUser) {
                $loginMessage = "Đăng nhập thành công";
                $divClass = "success";
                //echo "<script>alert('$email')</script>";
                $_SESSION['inforloginnow'] = array('email' => $email);
                
                if(isset($_SESSION["inforloginnow"]["email"]) && $_SESSION["inforloginnow"]["email"] === "admin@gmail.com") {
                    echo "<script>alert('Admin đang vào')</script>";
                    header("Location: admin.php");
                    exit(); 
                } else {
                    header("Location: products.php");
                    exit(); 
                } 
            } else {
                //echo "<script>alert('Sai mật khẩu đăng nhập!')</script>";
                $loginMessage = "Gmail đăng nhập hoặc mật khẩu không chính xác!";
                $divClass = "failure";
                
            }
        }

        $stmt->close();
    }
}
?>
            <div class="check_valid <?php echo $divClass; ?>"><?php  echo $loginMessage; ?></div>

            <div class="div_form">
                <form action="" method="post">
                    <div class="chung">
                        <p style="margin-bottom: 10px;">EMAIL</p>
                        <input style="padding: 8px 0px;" type="email" placeholder="Nhập địa chỉ email" name="email"  value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
                    </div>
                    <div class="chung">
                        <p style="margin-bottom: 10px;">NHẬP MẬT KHẨU</p>
                        <input style="padding: 8px 0px;" type="password" placeholder="Nhập mật khẩu" name="password" value="<?php echo isset($_POST["password"]) ? $_POST["password"] : ''; ?>">
                    </div>
                    <div class="chung">
                        <input type="submit" name="login" id="login" value="ĐĂNG NHẬP" style="background-color: #000000; color: #FFFFFF;font-size: 15px;
                        padding: 5px 10px;" >
                    </div>
                    
                    
                </form>
            </div>
           <div class="dn_qua"><span>Hoặc đăng nhập qua</span></div>
           <div class="bl_dn_c2">
                <div class="c2_log" id="fb"><a href=""></a>Facebook</div>
                <div class="c2_log" id="gg"><a href=""></a>Google</div>
           </div>

          
            <button id="myButton"  >Hỗ trợ sự cố</button>
            <?php include 'footer.php';?>

        </div>
        <script>
        var btn_rg = document.getElementById("btn_rg");
        btn_rg.addEventListener("click", function() {
            window.location.href = "rigister.php";
        });
        </script>



       

        
    
</body>
</html>
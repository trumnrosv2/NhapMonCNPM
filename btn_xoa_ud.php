<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin update sản phẩm</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/chung.css">
    <link rel="stylesheet" href="css/add_sp.css">
    <style>
        #myButton {
    position: fixed;
    bottom: 10px; 
    right: 10px;
    z-index: 999; 
    padding: 10px 20px;
    background-color: #000000; 
    color: #FFFFFF; 
    border: none;
    border-radius: 5px;
    cursor: pointer;
    cursor: pointer;
}

    </style>
</head>
<body>
    <div class="khung_account">
    <?php include 'header.php';?>
        <div class="khoi_chung_dn_dk">
                <p>Admin</p>
        </div>
        <!-- Đây là thân trang -->
        <div class="khung-add-sp">
        <h2 style="color: #FF0000; margin: auto;text-align: center;">Bạn có chắc muốn xóa sản phẩm này</h2>
        <div class="div_2btn">
           <input type="submit" value="Có" name="co" id="co">
           <input type="submit" value="Không" name="khong" id="khong">
        </div>
        </div>
        
        <!-- Thân trang -->
        <button id="myButton"  >Hỗ trợ sự cố</button>
        <?php include 'footer.php';?>
       </div>

    </div>
    <script>
        var back_admin = document.getElementById("back_admin");
        back_admin.addEventListener("click", function() {
            window.location.href = "admin.php";
        });
        </script>
</body>
</html>
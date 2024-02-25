<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang sản phẩm</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/chung.css">
    <link rel="stylesheet" href="css/product.css">
    <style>
        img {
    max-width: 100%;
    max-height: 100%;
    width: auto;
    height: auto;
    display: block;
    margin: 5% auto 0 auto;
    object-fit: contain; /* hoặc 'contain' tùy thuộc vào yêu cầu của bạn */
    object-position:  center center; /* Có thể là 'top', 'right', 'bottom', 'left', ... */
    transition: opacity 0.3s ease-in-out;
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1); 
}

img:hover {
    opacity: 0.8;
    /* Add any other hover effects you desire */
}
    </style>
</head>
<body>
    <div class="khung_account" style="width: 90%; ">
    <?php include 'header.php'; ?>
    <?php
   
//echo$_SESSION["inforloginnow"]["email"];
if(isset($_SESSION["inforloginnow"])){
    if(isset($_SESSION["cart_Nolog"])){
        $sqlGETid = $conn->query("SELECT id FROM users WHERE email = '" . $_SESSION["inforloginnow"]["email"] . "'");
        $z = $sqlGETid->fetch_assoc();
        $id_user = $z["id"];
        //$cartUser = json_decode($_COOKIE['cart'], true); // ép JSON nó về dạng đối tượng

        $sql_insert = $conn->query("INSERT INTO cart (UserID, ProductID, ProductName, Size_x, Quantity, Price, Total, DateTime_x, img_sanpham)
        VALUES ('$id_user', '{$_SESSION["cart_Nolog"]['ProductID']}', '{$_SESSION["cart_Nolog"]['ProductName']}','{$_SESSION["cart_Nolog"]['Size_x']}',
        '{$_SESSION["cart_Nolog"]['Quantity']}', '{$_SESSION["cart_Nolog"]['Price']}','{$_SESSION["cart_Nolog"]['Total']}','{$_SESSION["cart_Nolog"]['Datatime_x']}',
        '{$_SESSION["cart_Nolog"]['img_sanpham']}')");
        unset($_SESSION['cart_Nolog']);
        
    }
    
}else{
   //.....
}

?>

        <div class="khoi_chung_dn_dk" style="position: relative; overflow: visible;">
                <p>Tất cả sác sản phẩm</p>
        </div>
        <!-- <div class="check_valid ></div> -->
        
       <div class="div_than_trang">
            
       <?php include 'left.php';?>
       
       <?php include 'right.php';?>
       
        </div>
        <button id="myButton"  >Hỗ trợ sự cố</button>
        <?php include 'footer.php';?>
    </div>
    
</body>
</html>
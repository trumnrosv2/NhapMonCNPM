
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết sản phẩm</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/chung.css">
    <link rel="stylesheet" href="css/product.css">
    <style>
        .detail{
            font-family: 'Source Sans Pro', sans-serif;
        }
        .detail p{
            margin: auto; text-align: left;
            font-size: 18px;margin-left: 10px; margin-top: 10px;
            line-height: 2;
        }
        .detail span{
            font-size: 16px;
            margin-left: 10px;
        }
        input{
            margin-left: 10px;
            text-indent: 0px;
            padding: 5px 0px;
        }
        .chitiet{
            padding-bottom: 10px;
        }
        .chitiet>form>button{
            padding: 5px 20px;
            color: #FFFFFF;
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 16px;
            border: none;

            margin-left: 10px;
            margin-right: 10px;
        }
        .chitiet>a{
            color: #3D72F8;
            margin-left: 10px;
           
        }
        .trongthidz{
            padding: 10px 0px;
            margin-top: 50px;
            color: #1E66F2;
            font-size: 20px;
            text-align: center;
            font-family: 'Source Sans Pro', sans-serif;
            font-weight: bold;
        }
        .sanphamand{
            width: 100%;
            height: 300px;
            display: flex;
            justify-content: space-around;
        }
        .inner-container {
        width: 30%;
        background-color: #F5F5F5;
        float: left;
        margin: 10px 10px;
        box-sizing: border-box;
        }

        .inner-box {
    
        text-align: center;
        }

        .inner-box img {
             width: 100%;
            height: 100%;
            object-fit: cover; 
        }

        .inner-box p {
            margin: 5px 0; 
            color: black;
        }

        .inner-container:nth-child(3) {
            clear: both;
        }
        #error{
            color: #F45050;
        }
        img {
    max-width: 100%;
    
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
    <div class="khung_account" style="width: 77%;">
    <?php include 'header.php';?>
    <?php

include 'connectDB.php';
if(isset($_SESSION['inforloginnow'])){
    $emailUserLG = $_SESSION["inforloginnow"]["email"];
   // echo$_SESSION["inforloginnow"]["email"];
    $sql_id = $conn->query("SELECT * FROM users WHERE email = '$emailUserLG'");
    $x= $sql_id->fetch_assoc();
    $id_user = $x["id"];
    //echo "<script>alert('$id_user')</script>";
    //echo$id_user;

    $sql_sum_cart = $conn->query("select COUNT(cart.UserID) as tong_cart from cart WHERE UserID='$id_user'");

    $y = $sql_sum_cart->fetch_assoc();
    
    $sumCart = (int)$y["tong_cart"];
}
if(isset($_GET['ProductID'])){
$sql = $conn->query("SELECT product.*, brands.BranName
                     FROM product
                     INNER JOIN brands ON product.BrandID = brands.BrandID
                     Where ProductID ='$_GET[ProductID]'");
$temp = $sql->fetch_assoc();
//print_r($temp);

}
?>
        <div class="khoi_chung_dn_dk">
                <p><?php echo$temp["ProductName"]  ?></p>
               
        </div>
        <?php
           if(isset($_POST["add_cart"]) ){
                if(!isset($_SESSION["inforloginnow"])  ){
             
                $sql = $conn->query("SELECT product.*, brands.BranName
                             FROM product
                             INNER JOIN brands ON product.BrandID = brands.BrandID
                             Where ProductID ='$_GET[ProductID]'");
                $temp = $sql->fetch_assoc();
                
                $sl = $_POST["sl"];
                $x = (int)$sl;
                $y = (int)$temp["Price"];

                $Total = $x*$y; // giá

                $currentDateTime = date('Y-m-d H:i:s');
                $size = $_POST["size"];
                
                if (!isset($_SESSION["cart_log"])) {
                    
                    $_SESSION["cart_Nolog"] = array(
                        "ProductID" => $temp["ProductID"],
                        "ProductName" => $temp["ProductName"],
                        "Size_x" => $size,
                        "Quantity" => $sl,
                        "Price" => $temp['Price'],
                        "Total" => $Total,
                        "Datatime_x" => $currentDateTime,
                        "img_sanpham" => $temp["ImgProduct"]
                    );
                    //echo "<script>alert('Có sesion cart_log')</script>";
                } else {           
                    // nếu tồn tại $_SESSION["cart_log"]["Quantity"] += $sl; để tăng số lượng tiếp
                    //nhưng phải có js bắt onclick; 
                }

               
                echo "<script>alert('Hãy đăng nhập đi đã vội thế')</script>";
                
                echo "<script>window.location = 'login.php';</script>";
                
                //exit(); 
                }
            
        }
        
        ?>
        <!-- <div class="check_valid ></div> -->
        
       <div class="div_than_trang" style="margin: auto; display: flex; justify-content: flex-start; ">
            <div class="anh" style="width: 35%; margin-right: 3%; margin-left: 3%;">
                <img src="<?php echo$temp["ImgProduct"] ?>" alt="" style="width: 90%; height: 90%;">
            </div>
            <div class="detail" style="width: 60%; background-color: #D9D9D9;">
                <p style=""><?php echo$temp["ProductName"]  ?></p>
                <span style="">Thương hiệu: <?php echo$temp["BranName"]." "?>---</span>
                <span>Mã sản pẩm: <?php echo$temp["Ma_SanPham"]  ?></span>
                <p style="color: #FF0000;"><?php echo number_format($temp["Price"],0,',','.').'đ' ?></p>
                <div class="chitiet">

                   <?php 
                        if(isset($_SESSION["inforloginnow"]["email"]) && $_SESSION["inforloginnow"]["email"] === "admin@gmail.com"){
                            echo '
                            <form action="" method="POST">
                                <button style="background-color: #4C49F9;" name="update"><a href="?Model=update&ProductID=' . $_GET["ProductID"] . '">Update sản phẩm</a></button>
                                <button style="background-color: #F45050;" name="delete"><a href="">Xóa sản phẩm</a></button><br><br>
                               <br>
                            </form>';
                        
                        }else{
                            echo '
                            <form action="" method="POST">
                                <input type="number" name="sl" value="1" style="width: 30px;" min="1" max="100">
                                <button style="background-color: #4C49F9;" name="add_cart">Thêm vào giỏ hàng</button>
                                <button style="background-color: #F45050;">Mua ngay</button><br><br>
                                <input type="text" placeholder="Chọn size" name="size" id="size">
                                 <span id="error">';
                                if(isset($_POST["size"])) {
                                    echo "Bạn chưa nhập size";
                                }
                                echo '
                            </span><br><br>
                            </form>';
                        }
                   ?>
                    <?php  
                        if(isset($_GET["update"])){
                            $sql = $conn->query("SELECT product.*, brands.BranName
                            FROM product
                            INNER JOIN brands ON product.BrandID = brands.BrandID
                            Where ProductID ='$_GET[ProductID]'");
                            $temp = $sql->fetch_assoc();
                            //header("Location: update_sanphamADM.php");
                          

                        }
                    
                    ?>
                    <span >Size:</span><br>
                    <span>37-</span> <span>&nbsp38-</span><span>&nbsp39-</span> <span>&nbsp40-</span> <span>&nbsp41-</span> <span>41</span>
                    <br><br>
                    <!-- <input type="text" placeholder="Chọn size" name="size" id="size"><br><br> -->
                    <a href="">Xem hướng dẫn chọn file</a>
                    <p style="font-size: 15px;">Áo nỉ nữ có mũ dáng relax với thiết kế đơn giản và điểm nhấn là hình đồ họa, dễ kết hợp với nhiều trang phục và nhiều hoàn cảnh sử dụng.Sự kết hợp của 2 thành phần sợi cotton và polyester với cấu trúc dệt vòng lông ở mặt trái, giúp cho sản phẩm giữ nhiệt tốt và bề mặt vải đanh mịn, thoải mái khi mặc và vận động.</p>
                    
                </div>
                
            </div>
            
        </div>
        <div style="padding: 5px 18px; background-color: #F45050; width: 15%; color: #FFFFFF;
         font-family: 'Source Sans Pro', sans-serif; margin-left: 10px; margin-top: 20px;">Thông tin chi tiết</div>
         <div style="margin-left: 10px; font-size: 16px;  font-family: 'Source Sans Pro', sans-serif; line-height: 1.5;
         padding-top: 8px;">
            Áo Polo Nam Davin vải cá sấu Cotton Interlock phom Regular Fit là một loại áo polo nam có kiểu dáng phom Regular Fit và được làm từ chất liệu vải cá sấu Cotton Interlock.
            Áo có kiểu dáng phom Regular Fit, tức là vừa vặn và thoải mái trên cơ thể. Chất liệu vải cá sấu Cotton Interlock là một loại vải mềm mại, thoáng khí và có độ bền cao.
            Áo Polo Nam Davin vải cá sấu Cotton Interlock phom Regular Fit thường có các chi tiết như cổ áo polo, nút cài phía trước và tay áo ngắn. Nó thường có màu sắc đa dạng và phù hợp với nhiều dịp khác nhau, từ đi làm đến dạo phố hay tham gia các hoạt động thể thao nhẹ nhàng.
         </div>
         <div class="trongthidz">
                SẢN PHẨM TƯƠNG TỰ
         </div>
         <?php
            $sql = $conn->query("SELECT product.*, brands.BranName
            FROM product
            INNER JOIN brands ON product.BrandID = brands.BrandID
            LIMIT 4");
            //print_r($sql);
            $temp = $sql->fetch_assoc();

        ?>

        
         <div class="sanphamand">
         <?php    

        while ($row = $sql->fetch_assoc()) {
        ?>
            <div class="inner-container">
                <div class="inner-box">
                    <a href="detail_product.php?Model=sanpham&ProductID=<?php echo $row["ProductID"] ?>">
                    <img src="<?php echo$row["ImgProduct"] ?>" alt="" style="width: 100%; height: 180px;"><br>
                    <p class="tsp" style="font-size: 15px;"><?php echo$row["ProductName"] ?></p>
                    <p class="thieu"><?php echo$row["BranName"] ?></p>
                    <p class="giasp" style="color: #F45050;"><?php echo number_format($row["Price"],0,',','.').'đ' ?></p>
                </div>
            </div>
        <?php
            }
        ?>
         </div>

        <button id="myButton"  >Hỗ trợ sự cố</button>
        <?php include 'footer.php';?>
    </div>
    

    <?php
                        if(isset($_POST["add_cart"])){
                            $sql = $conn->query("SELECT product.*, brands.BranName
                             FROM product
                             INNER JOIN brands ON product.BrandID = brands.BrandID
                             Where ProductID ='$_GET[ProductID]'");
                             $temp = $sql->fetch_assoc();
                            $sl = $_POST["sl"];
                            $size = $_POST["size"];
                            $intx = (int)$sl; // Sử dụng (int) để ép kiểu $sl về integer
                           
                            
                            if($sumCart>10){
                                echo "<script>alert('Bạn đang có 10 sản phẩm trong giỏi hàng')</script>";
                                return;
                            }
                            if(!is_numeric($size)){
                                echo "<script>alert('Size phải là dạng số')</script>";
                                return;
                            }
                            $x = (int)$sl;
                            $y = (int)$temp["Price"];
                            $Total = $x*$y;
                            $currentDateTime = date('Y-m-d H:i:s');
                            //echo$temp['ProductID']
                            $sql_insert = $conn->query("INSERT INTO cart (UserID, ProductID, ProductName, Size_x, Quantity, Price, Total, DateTime_x, img_sanpham)
                            VALUES ('$id_user', '{$temp['ProductID']}', '{$temp['ProductName']}', '$size',
                            '$sl', '{$temp['Price']}', '$Total', '$currentDateTime', '{$temp['ImgProduct']}')");
                            if($sql_insert){
                                echo "<script>alert('Đã thêm vào giỏ hàng')</script>";
                            }
                        }
                    ?>
</body>
</html>
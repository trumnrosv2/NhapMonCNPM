<?php 
   
    
    session_start();

// if (isset($_SESSION["cart_Nolog"])) {
//     echo "<script>alert('Có session cart')</script>";
// }
include 'connectDB.php';
if(isset($_SESSION['inforloginnow'])){
    $emailUserLG = $_SESSION["inforloginnow"]["email"];
   
   // echo$_SESSION["inforloginnow"]["email"];
    $sql_id = $conn->query("SELECT * FROM users WHERE email = '$emailUserLG'");
    $x= $sql_id->fetch_assoc();
    $id_user = $x["id"];
    
    //echo "<script>alert('$id_user')</script>";
    //echo$id_user;
}
  ?>
<div class="header" style="
   overflow: hidden;
">
            <div class="imp_hd" style="width: 15%;max-height: 10%;">
                <img src="img_sp/GS.png" alt="Logo" style="width: 90px;height: 100%; margin-left: 20px;" >
            </div>
            <div style="width: 56%; padding-right: 8%;">
                <ul class="menu_header">
                    <li><a href="trangchu.php">Trang Chủ</a></li>
                    <li><a href="?Model=gioithieu">Giới Thiệu </a></li>
                    <li><a href="?Model=product">Sản Phẩm</a></li>
                    <li><a href="?Model=infor">Liên Hệ</a></li>
                </ul>
            </div>
            <?php
                if (isset($_GET['Model'])) {
                    $page = $_GET['Model'];
                
                    if ($page == 'gioithieu' && isset($_GET['ProductID']) && isset($_GET['sl'])) {
                        $ProductID = $_GET['ProductID'];
                        header("Location: detail_product.php?Model=sanpham&ProductID=$ProductID");
                    } else {
                        // đây là trang admin
                        if($page == 'sanpham_admin' && isset($_SESSION["inforloginnow"]["email"]) 
                        && $_SESSION["inforloginnow"]["email"] === "admin@gmail.com"){
                            if(isset($_GET['ProductID'])){
                                $ProductID = $_GET["ProductID"];
                            }
                            header("Location: detail_product.php?ProductID=$ProductID");

                        }
                        if($page =="update"){
                            if(isset($_GET['ProductID'])){
                                $ProductID = $_GET["ProductID"];
                            }
                            header("Location: update_sanphamADM.php?ProductID=$ProductID");
                        }
                        if($page =='sanpham'){
                            if(isset($_GET['ProductID'])){
                                $ProductID = $_GET["ProductID"];
                            }
                            header("Location: detail_product.php?ProductID=$ProductID");
                                                      
                        }
                        if($page =='cart'){
                            header("Location: cart.php");
                            //header("Location: cart.php?UserID=$id_user");
                          
                        }
                        if($page =='login'){

                            
                          if(isset($_SESSION["inforloginnow"])){
                            unset($_SESSION['inforloginnow']);
                          }
                            
                            header("Location: login.php");
                        }
                        if ($page == 'gioithieu') {
                            header("Location: Error.php");
                            // Xử lý trang giới thiệu
                        } elseif ($page == 'product') {
                            header("Location: products.php");
                        } elseif ($page == 'infor') {
                            header("Location: Error.php");
                        } else {
                            // // Xử lý mặc định nếu giá trị không khớp với các trường hợp trên đẩy đến trang lỗi
                            // header("Location: Error.php");
                        }
                    }
                }
                ?>
                


               
            <?php
            //session_start();
            if (isset($_SESSION["inforloginnow"]) &&
            isset($_SESSION["inforloginnow"]["email"]) && $_SESSION["inforloginnow"]["email"] !== "admin@gmail.com"
            ) {
                echo '
                <div style="width: 26%">
                    <ul class="icon_header">
                        <li><i class="fa fa-search" aria-hidden="true" style="font-size: 22px; margin-right: 10px;"></i></li>
                        <li><a href="?Model=login"><i class="fa fa-sign-in" aria-hidden="true" style="font-size: 22px; margin-right: 10px;  font-family: "Source Sans Pro", sans-serif;"></i>Log out</a></li>
                        <li><i class="fa fa-heart" aria-hidden="true" style="font-size: 22px; margin-right: 10px;"></i></li>
                        <li><a href="?Model=cart"><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 22px; margin-right: 10px;"></i></a></li>
                    </ul>
                </div>
                ';
            
                
            }elseif(isset($_SESSION["inforloginnow"]) &&
            isset($_SESSION["inforloginnow"]["email"]) && $_SESSION["inforloginnow"]["email"] === "admin@gmail.com"){
                echo '
                <div style="width: 40%">
                    <ul class="icon_header">
                        <li><i class="fa fa-search" aria-hidden="true" style="font-size: 22px; margin-right: 10px;"></i></li>
                        <li><a href="?Model=login"><i class="fa fa-sign-in" aria-hidden="true" style="font-size: 22px; margin-right: 10px;  font-family: "Source Sans Pro", sans-serif;"></i>Log out</a></li>
                        <li><i class="fa fa-heart" aria-hidden="true" style="font-size: 22px; margin-right: 10px;"></i></li>
                        <li><a href="?Model=cart"><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 22px; margin-right: 10px;"></i></a></li>
                        <li><a href="admin.php">Vào admin</a></li>
                    </ul>
                </div>
                ';
            }
             else {
                echo '
                <div style="width: 26%">
                    <ul class="icon_header">
                        <li><i class="fa fa-search" aria-hidden="true" style="font-size: 22px; margin-right: 10px;"></i></li>
                        <li><i class="fa fa-sign-in" aria-hidden="true" style="font-size: 22px; margin-right: 10px;"></i><a href="rigister.php">Đăng ký</a></li>
                        <li><i class="fa fa-heart" aria-hidden="true" style="font-size: 22px; margin-right: 10px;"></i></li>
                        <li><a href="?Model=cart"><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 22px; margin-right: 10px;"></i></a></li>
                    </ul>
                </div>
                ';
            }
            

            ?>
            
            
        </div>


    


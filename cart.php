

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/chung.css">
    <link rel="stylesheet" href="css/product.css">
    <style>
        .cart_body{
            margin: auto;
            width: 90%;
            margin-top: 1%;
            background-color: #E5E5E5;
            padding: 20px 0px;
        }
        .cac_sp{
            width: 90%;
            max-height: 180px;
            margin: auto;
            display: flex;
            justify-content: space-between;
        }
        .anh_sp{
            padding: 10px 0px;
            width: 30%;
           /* background-color: black; */
            
        }.anh_sp img{
            width: 60%;
            margin-left: 20%;
            height: 100%;
        }
        .ct_gh{
            width: 70%;
           
            background-color: #ffffff;
        }
        table{
           

        }
        table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
        font-family: 'Source Sans Pro', sans-serif;
        
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px; /* Khoảng cách giữa nội dung và mép của mỗi ô */
        text-align: left;
    }
    .thanh_toan{
        font-family: 'Source Sans Pro', sans-serif;
        font-size: 18px;
        padding: 10px 10px;
        margin-top: 3%;
       
    }
    #payment{
        padding: 7px 15px;
        background-color: #4C49F9;
        border: none;
        color: #ffffff;
        
        font-family: 'Source Sans Pro', sans-serif;
        font-size: 16px;
    }
    
    </style>
</head>
<body>
    <div class="khung_account" style="width: 85%;">
    <?php include 'header.php';?>
    <?php
    if(!isset($_SESSION["inforloginnow"])){
        echo "<script>alert('Vui lòng đăng nhập!')</script>";
        header("Location: login.php");
    }
include 'connectDB.php';
  
    $sql = $conn->query("SELECT cart.*, users.first_name, users.last_name
                     FROM cart
                     INNER JOIN users ON cart.UserID = users.id
                     WHERE cart.UserID = '" . $id_user . "'");
    $temp = $sql->fetch_assoc();
    //print_r($temp);

    $sql2 = $conn->query("SELECT SUM(Total) AS tt FROM cart WHERE UserID = '" . $id_user . "'");
    $sql2 = $conn->query("SELECT Quantyti*Price AS tt FROM cart WHERE UserID = '" . $id_user . "'");
    $bien2 = $sql2->fetch_assoc();
    $Total = (int)$bien2["tt"];
    $sql_sum_cart = $conn->query("select COUNT(cart.UserID) as tong_cart from cart WHERE UserID='$id_user'");

    $m = $sql_sum_cart->fetch_assoc();
    $tongGioHang = (int)$m["tong_cart"];
   
    //echo$Total;
    
    

?>
        <div class="khoi_chung_dn_dk">
                <p>GIỎ HÀNG</p>
        </div>
        <!-- <div class="check_valid ></div> -->
        
    
       <?php  if ($sql->num_rows == 0) {  ?>
            
                <div style='width:50%;margin: auto;padding-top: 5%;'>
                <span style='color: red;font-size: 22px'>Bạn chưa có sản phẩm ở giỏ hàng - </span>
                <a href='?Model=product' style='color:blue;'>Ấn vào đây để quay lại</a>
                </div>

        <?php } 
        else{
            echo "
            <div style='width: 90%; margin: auto; margin-top: 5%;'>
                <button style='font-size: 18px; padding: 10px 20px;'>Sản phẩm trong giỏ hàng</button>
                <h3 style='color: #687EFF'>Có: $tongGioHang sản trong giỏ hàng </h3>
            </div>
            
            ";
        
            ?>
       <?php  
        
        echo '
        <div class="cart_body">
            <div class="cac_sp">
                <div class="anh_sp">
                    <img src="' . $temp["img_sanpham"] . '" alt="" width="">
                </div>
                <div class="ct_gh">
                    <table>
                        <tr>
                            <th style="margin-left: 20px;">Tên sản phẩm</th>
                            <th>Người đặt</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Xoá</th>
                        </tr>
                        <tr>
                            <td>' . $temp["ProductName"] . '</td>
                            <td>' . $temp["first_name"] . $temp["last_name"] . '</td>
                            <td>' . number_format($temp["Price"], 0, ',', '.') . 'đ</td>
                            <td><input type="number" name="sl_new" id="sl_new" value="' . $temp["Quantity"] . '" style="width: 30px;"></td>
                            <td>' . number_format($temp["Total"], 0, ',', '.') . 'đ</td>
                            <td><a href="xoa.php?id=' . $temp['id'] . '" style="color: black;">Xoá</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>';
    
       while ($row = $sql->fetch_array(MYSQLI_ASSOC)) { ?>
           <div class="cart_body">
               <div class="cac_sp">
                   <div class="anh_sp">
                       <img src="<?php echo $row["img_sanpham"] ?>" alt="" width="">
                   </div>
                   <div class="ct_gh">
                       <table>
                           <tr>
                               <th style="margin-left: 20px;">Tên sản phẩm</th>
                               <th>Người đặt</th>
                               <th>Đơn giá</th>
                               <th>Số lượng</th>
                               <th>Thành tiền</th>
                               <th>Xóa</th>
                           </tr>
                           <tr>
                               <td><?php echo $row["ProductName"] ?></td>
                               <td><?php echo $row["first_name"] . $row["last_name"] ?></td>
                               <td><?php echo number_format($row["Price"], 0, ',', '.') . 'đ' ?></td>
                               <td><input type="number" name="sl_new" id="sl_new" value="<?php echo $row["Quantity"] ?>" style="width: 30px;"></td>
                               <td><?php echo number_format($row["Total"], 0, ',', '.') . 'đ' ?></td>
                               <td><a href='xoa.php?id=<?php echo $row['id']; ?>' style="color: black;">xóa</a></td>
                           </tr>
                       </table>
                   </div>
               </div>
           </div>
       <?php
       }
       echo "
       <div class='thanh_toan'>
           <div style='margin-left: 75%;'>
               <span style='margin-right: 20px;'>Tổng tiền: </span>
               <span style='color: #FF0000;'>" . number_format($Total, 0, ',', '.') . 'đ' . "</span><br>
               <button name='payment' id='payment' style='margin-top: 10px;'><a href=''>Thanh toán</a></button>
           </div>
       </div>
        ";
   
       ?>
       <?php
       }
       ?>
       
        
        <button id="myButton"  >Hỗ trợ sự cố</button>
        <?php include 'footer.php';?>
    </div>
    
</body>
</html>
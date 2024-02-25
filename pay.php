<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang thanh toán</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/chung.css">
     <link rel="stylesheet" href="css/product.css">
    
     <style>
         .left2{
            width: 23%;
            
         }
        .left2 input{
            width: 80%;
            height: 30px;
            text-indent: 5px;
        }
        textarea{
           width: 80%;
           height: 30px;
           
        }
     </style>

</head>
<body>
    <div class="khung_account" style="width: 88%;">
    <?php include 'header.php';?>
        <div class="khoi_chung_dn_dk">
                <p>Thannh toán</p>
        </div>
        <!-- <div class="check_valid ></div> -->
        
       <div class="div_than_trang" style="width: 90%; margin:auto; margin-top3%">
            <div class="left2">
                <h3 style="padding: 10px">Thông tin nhận hàng</h3>
                <p><input type="email" name="email" placeholder="Email" ></p><br><br> 
                <p><input type="text" name="name" placeholder="Họ và tên" ></p> <br><br> 
                <p><input type="text" name="sdt" placeholder="Email" ></p> <br><br> 
                <p><input type="text" name="address" placeholder="Địa chỉ" ></p> <br><br> 
                <textarea name="note" placeholder="Ghi chú"></textarea>

            </div>

            <div class="left2">
                <h3 style="padding: 10px">Vận chuyển</h3>
                <input type="text" value="Mở chi tiets đơn hàng để kiểm tra"><br><br>
                <h3>Thanh toán</h3>
                <br>

                <input type="text" value="Thanh toán khi giao hàng">
            </div>
            <div style="width: 45%; height: 400px; background: #f7f7f7;"></div>

        </div>
        <button id="myButton"  >Hỗ trợ sự cố</button>
        <?php include 'footer.php';?>
    </div>
    
</body>
</html>
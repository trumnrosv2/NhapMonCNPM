<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/chung.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="khung_account" style="width: 86%;">
    <?php include 'header.php';?>
        <div class="khoi_chung_dn_dk">
                <p>Admin</p>
        </div>
        <div class="body_page_adm">
            <div class="hd_ad">
                <p>Sản phẩm</p>
                <!-- <p><button id="btn_up" ></button></p> -->
                <p><button id="btn_sp" >Thêm sản phẩm</button></p>
             </div>
             <div class="frame_adm">
                <div class="hdx_ad">
                    <ul>
                        <li><a href="">Tất cả sản phẩm</a></li>
                        <li><a href="">Sản phẩm đang bán</a></li>
                        <li><a href="">Sản phẩm nháp</a></li>
                        <li><a href="">Lữu trữ</a></li>
                    </ul>
                </div>
                <div class="finp_sp" style="margin-top: 2%; font-size: 18px;">

                    <form method='Get' action='findProduct.php' style="width: 100%;">
                        <input type="text" placeholder="Tìm kiếm sản phầm" id="find_sp" name="find_sp_x"
                        style="font-size: 14px;width: 88%; padding: 1%; margin-right: 3%;">
                        <input type='hidden' name='id' value=''>
                        <button name="timkiem" style="background-color: #f4f4f4; border: none; padding: 0px 10px;">
                            <i class="fa fa-search" aria-hidden="true" style="font-size: 26px; background-color: #f4f4f4; cursor: pointer;"></i>
                        </button>
                    </form>
                   <?php 
                    
                   ?>
                </div>
                <div class="hd_ad2">
                    <p>Sản phẩm</p>
                    <p>Trạng thái</p>
                </div>
                <hr>
                <div class="chung_anh">
                    <div class="if_sp">
                        <div class="img_sp">
                            <img src="img_sp/ao-polo-dep-2.jpg" alt="">
                        </div>
                        <div style="font-size: 16px; font-family: Arial, Helvetica, sans-serif;
                         padding-top: 2%; width: 70%; height: 30px
                        ;">tên sản phẩm nha</div>
                    </div>
                    <p class="satatus">Đang bán</p>
                </div>
                <hr>
                <div class="chung_anh">
                    <div class="if_sp">
                        <div class="img_sp">
                            <img src="img_sp/ao-polo-dep-2.jpg" alt="">
                        </div>
                        <div style="font-size: 16px; font-family: Arial, Helvetica, sans-serif;
                         padding-top: 2%; width: 80%; height: 30px
                        ;">tên sản phẩm nha</div>
                    </div>
                    <p class="satatus">Đang bán</p>
                </div>
                <hr>
                <div class="chung_anh">
                    <div class="if_sp">
                        <div class="img_sp">
                            <img src="img_sp/ao-polo-dep-2.jpg" alt="">
                        </div>
                        <div style="font-size: 16px; font-family: Arial, Helvetica, sans-serif;
                         padding-top: 2%; width: 80%; height: 30px
                        ;">tên sản phẩm nha</div>
                    </div>
                    <p class="satatus">Đang bán</p>
                </div>
                <hr>
                <div class="chung_anh">
                    <div class="if_sp">
                        <div class="img_sp">
                            <img src="img_sp/ao-polo-dep-2.jpg" alt="">
                        </div>
                        <div style="font-size: 16px; font-family: Arial, Helvetica, sans-serif;
                         padding-top: 2%; width: 80%; height: 30px
                        ;">tên sản phẩm nha</div>
                    </div>
                    <p class="satatus">Đang bán</p>
                </div>
             </div>
        </div>
        <button id="myButton"  >Hỗ trợ sự cố</button>
        <?php include 'footer.php';?>
    </div>
    <script>
        var btn_sp = document.getElementById("btn_sp");
        btn_sp.addEventListener("click", function() {
            window.location.href = "add_sanpham.php";
        });
        </script>
</body>
</html>
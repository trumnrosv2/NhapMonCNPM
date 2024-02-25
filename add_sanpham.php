<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
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
            <form action="" method="post" enctype="multipart/form-data">

            
            <div class="chung_div">
                <button id="back_admin"><i class="fa fa-arrow-left" aria-hidden="true" style="font-size: 33px; margin-right: 5%;" ></i></button>
                
                <span>Thông tin về sản phẩm</span>
            </div>

         
            <div class="chung_div">
            <label for="selectOption" style="font-family: 'Source Sans Pro', sans-serif;
            font-size: 16px; font-weight: 500;">Chọn thương hiệu:</label>
                <select name="selectOption" id="selectOption" style="padding: 7px 10px;">
                    <option value="" selected disabled>Loại sản phẩm</option>   
                    <option value="1">Áo</option>
                    <option value="2">Quần</option>
                    <option value="3">Giày</option>
                    <option value="4">Dép</option>
                </select>
            </div>
            <div class="chung_div">
            <label for="Brands" style="font-family: 'Source Sans Pro', sans-serif;
            font-size: 16px; font-weight: 500;">Chọn loại sản phẩm:</label>
                <select name="Brands" id="Brands" style="padding: 7px 10px;">
                    <option value="" selected disabled>Thương hiệu</option>   
                    <option value="1">Owen</option>
                    <option value="2">Biluxury</option>
                    <option value="3">Routine</option>
                    <option value="4">Poloman</option>
                    <option value="5">Coolmate</option>
                </select>
            </div>
            <!--  đây là trang sẽ upfate sửa -->
            <div class="chung_div">
                <div class="fr_tsp">
                    <p>Mã sản phẩm</p> <br>
                    <input type="text" name="ma_sp" id="ma_sp" placeholder="Nhập mã sản phẩm"><br>
                </div>
            </div>
            <div class="chung_div">
                <div class="fr_tsp">
                    <p>Tên sản phẩm</p> <br>
                    <input type="text" name="name_sp" id="name_sp" placeholder="Nhập tên sản phẩm"
                    value="<?php echo isset($_POST["name_sp"]) ? $_POST["name_sp"] : ''; ?>"><br>
                </div>
            </div>

            <div class="chung_div">
                <div class="fr_tsp">
                    <p>Mô tả sản phẩm</p> <br>
                    <textarea name="motaSP" id="motaSP" cols="30" rows="6" placeholder="Nhập mô tả sản phẩm" 
                    style="outline-color: #3366FF;
                    padding-left: 10px;padding-top: 8px; font-size: 16px; font-family: 'Source Sans Pro', sans-serif;"
                    value="<?php echo isset($_POST["motaSP"]) ? $_POST["motaSP"] : ''; ?>"></textarea>
                </div>
            </div>

            <div class="chung_div">
                <div class="fr_tsp">
                    <p>Ảnh</p> <br>
                    <div style="width: 100%; padding: 1% 0%; border: 1px solid black;">
                        <input class="form-control"  type="file" name="file_tai_len" id="file_tai_len" style="padding-left: 10px;">
                    </div>
                </div>
            </div>

            <div class="chung_div">
                <div class="fr_tsp">
                    <p style="color: #176B87;">Giá sản phẩm</p> <br><br>
                    <p>Giá gốc</p>
                     <input type="text" name="giaGoc" id="giaGoc" motaSP value="<?php echo isset($_POST["giaGoc"]) ? $_POST["giaGoc"] : ''; ?>"><br><br>
                     <p>Giá sale</p>
                     <input type="text" name="giaSale" id="giaSale" value="<?php echo isset($_POST["giaSale"]) ? $_POST["giaSale"] : ''; ?>"><br>
                     <p>Số lượng hàng</p>
                     <input type="text" name="quantity" id="quantity" value="<?php echo isset($_POST["quantity"]) ? $_POST["quantity"] : ''; ?>"><br>
                </div>
            </div>
            <input type="submit" value="Lưu thông tin sản phẩm" name="save_product" id="save_product">
            </form>
            <?php
            include 'connectDB.php';
            function createUploadFolder($folderName) {
                if (!is_dir($folderName)) {
                    // Kiểm tra xem thư mục có tồn tại hay không
                    if (mkdir($folderName, 0777, true)) {
                        // Tạo thư mục nếu nó không tồn tại
                        echo "Thư mục '$folderName' đã được tạo thành công để lưu ảnh.";
                    } else {
                        echo "Không thể tạo thư mục '$folderName'.";
                    }
                } 
            }
            createUploadFolder("upload");
            function isPositiveNumber($number) {
                // Kiểm tra xem giá trị có phải là dạng số không
                if (is_numeric($number)) {
                    if ($number > 0) {
                        return true;  
                    } else {
                        return false;
                    }
                } else {
                    return false; 
                }
            }
            function isValidProductCode($code) {
                if (strpos($code, ' ') !== false || preg_match('/\s/', $code)) {
                    return false;
                }   
                if (!preg_match('/^[A-Za-z0-9]+$/', $code)) {
                    return false;
                }
                $minLength = 5;
                $maxLength = 20;
                $length = strlen($code);
            
                if ($length < $minLength || $length > $maxLength) {
                    return false;
                }
                return true;
            }
            if(isset($_POST["save_product"])){
                $selectOption = $_POST["selectOption"];
                $Brands   = $_POST["Brands"];
                $name_sp = $_POST["name_sp"];
                $ma_sp = $_POST["ma_sp"];
                $motaSP  = $_POST["motaSP"];
                $giaGoc = $_POST["giaGoc"];
                $giaSale = $_POST["giaSale"];
                $quantity = $_POST["quantity"];
                if(empty($selectOption)){
                    echo "<script>alert('Hyac chọn loại hàng')</script>";
                    return;
                }
                if ( empty($name_sp) || empty($motaSP) || empty($giaGoc) || empty($quantity)) {
                    echo "<script>alert('Vui lòng nhập đủ thông tin.')</script>";
                    return;
                }
                
                // check mã sản phẩm tồn tại
                $check_ma_sp = $conn->query("SELECT * FROM product WHERE Ma_SanPham = '$ma_sp'");
                if($check_ma_sp->num_rows >0){
                    echo "<script>alert('Mã sản phẩm đã tồn tại trong hệ hống')</script>";
                    return;
                }
                if (!isPositiveNumber($quantity)) {
                    echo "<script>alert('Tại sao bạn nhập số < 0 cho trường số lượng')</script>";
                    return;
                }
                if (!isPositiveNumber($giaGoc)) {
                    echo "<script>alert('Giá gốc phải là dạng số')</script>";
                    return;
                }
                if (!is_numeric($giaSale) || $giaSale<0) {
                    echo "<script>alert('Giá sale phải là dạng số nguyên lớn hơn 0')</script>";
                    return;
                }
                if($giaGoc <$giaSale){
                    echo "<script>alert('Giá gốc đang để giá gốc bé hơn giá sale kìa')</script>";
                    return;
                }
                $tenFile = basename($_FILES["file_tai_len"]["name"]);
                // xử lý úp ảnh
                //echo$tenFile;
                if($tenFile!=""){
                   
                    $uploadDirectory = "upload/";
                    $targetFile = $uploadDirectory . basename($_FILES["file_tai_len"]["name"]);
                    $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);
                    $maxFileSize = 1 * 1024 * 1024;  // Kích thước tối đa: 1 MB
                    if (!in_array($fileType, array("jpg", "png"))) {
                        echo "<script>alert('Chỉ cho phép tải lên các tệp có đuôi là 'jpg' hoặc 'png')</script>";
                    } elseif ($_FILES["file_tai_len"]["size"] > $maxFileSize) {
                        echo "Kích thước tệp quá lớn. Upload file lỗi.";
                    } 
                    else {
                        if (move_uploaded_file($_FILES["file_tai_len"]["tmp_name"], $targetFile)) {
                            //echo$targetFile;echo"<br>";
                            $sql_insert = $conn->query("INSERT INTO product (Ma_SanPham, ProductName, ProductDescription, Price,
                            PriceSale, Quantity, TypeID,BrandID, ImgProduct)
                            VALUES ('$ma_sp', '$name_sp', '$motaSP', '$giaGoc', '$giaSale', '$quantity', '$selectOption','$Brands','$targetFile')");

                            
                            /*   
                                Lưu ý rằng, việc sử dụng các biến trực tiếp trong câu truy vấn có thể tạo ra lỗ hổng bảo mật.
                                Bạn nên sử dụng các phương pháp như prepared statements để tránh SQL injection.
                                Dưới đây là một ví dụ sử dụng prepared statements:

                                // Chuẩn bị câu truy vấn với placeholders
                                $sql_insert = $conn->prepare("INSERT INTO product (ProductName, ProductDescription, Price,
                                PriceSale, Quantity, TypeID, ImgProduct)
                                VALUES (?, ?, ?, ?, ?, ?, ?)");

                                // Bind các giá trị vào các placeholders
                                $sql_insert->bind_param("sssssis", $name_sp, $motaSP, $giaGoc, $giaSale, $quantity, $selectOption, $targetFile);

                                // Thực hiện câu truy vấn
                                $sql_insert->execute();

                                // Đóng prepared statement
                                $sql_insert->close();

                            */



                            if($sql_insert){
                            echo "<script>alert('Thêm sản phẩm thành công.')</script>";
                            $name_sp = "";
                            $motaSP  = "";
                            $giaGoc = "";
                            $giaSale = "";
                            $quantity = "";
                            //header("Location: them_cau_hoi.php");
                            }else{
                                echo$conn->error;
                            }
                           
                        } else {
                            echo "<script>alert('Thêm sản phẩm không thành công lỗi hệ thống')</script>";
                        }
                    }
                    }else{
                    //  $conn->query("INSERT INTO question (id_user_add,loai_cauhoi,ten_cauhoi,file_anh,
                    //         dap_an,status_ch)
                    //         VALUES('$us_add',0,'$ten_cau_hoi','$targetFile','$da',0) ");
                            echo "<script>alert('Bạn chưa úp ảnh cho sản phẩm kìa')</script>";
                    }   

            }
            ?>
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
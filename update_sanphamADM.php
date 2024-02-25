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
                <p>Admin Update sản phẩm</p>
        </div>
        <?php
            if(isset($_GET['ProductID'])){
                $sql = $conn->query("SELECT product.*, brands.BranName, typeproduct.TypeName
                FROM product
                INNER JOIN brands ON product.BrandID = brands.BrandID 
                INNER JOIN typeproduct ON product.TypeID = typeproduct.TypeID
                WHERE product.ProductID ='$_GET[ProductID]'");

                $temp = $sql->fetch_assoc();
                //print_r($temp);
                
            }

        ?>
        <!-- Đây là thân trang -->
        <div class="khung-add-sp">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="chung_div">
                <button id="back_admin"><i class="fa fa-arrow-left" aria-hidden="true" style="font-size: 33px; margin-right: 5%;" ></i></button>
                
                <span>Thông tin về sản phẩm</span>
            </div>
            
            <div class="chung_div">
            <label for="selectOption" style="font-family: 'Source Sans Pro', sans-serif;
            font-size: 16px; font-weight: 500;">Chọn loại sản phẩm:</label>
                <select name="selectOption" id="selectOption" style="padding: 7px 10px;">
                    <option value="" disabled>Loại sản phẩm</option>   
                    <option value="1" <?php echo ($temp["TypeID"] == 1) ? 'selected' : ''; ?>>Áo</option>
                    <option value="2" <?php echo ($temp["TypeID"] == 2) ? 'selected' : ''; ?>>Quần</option>
                    <option value="3" <?php echo ($temp["TypeID"] == 3) ? 'selected' : ''; ?>>Giày</option>
                    <option value="4" <?php echo ($temp["TypeID"] == 4) ? 'selected' : ''; ?>>Dép</option>
                </select>

            </div>
            <div class="chung_div">
                <div class="fr_tsp">
                    <p>Mã sản phẩm</p> <br>
                    <input type="text" name="ma_sp" id="ma_sp" placeholder="mã sản phẩm" value="<?php echo ($temp["Ma_SanPham"])?>" readonly><br>
                </div>
            </div>
            <div class="chung_div">
                <div class="fr_tsp">
                    <p>Tên sản phẩm</p> <br>
                    <input type="text" name="name_sp" id="name_sp" placeholder="Nhập tên sản phẩm" value="<?php echo ($temp["ProductName"])?>"><br>
                </div>
            </div>

            <div class="chung_div">
                <div class="fr_tsp">
                    <p>Mô tả sản phẩm</p> <br>
                    <textarea name="motaSP" id="motaSP" cols="30" rows="6" placeholder="Nhập mô tả sản phẩm" 
                        style="outline-color: #3366FF; font-size: 16px; font-family: 'Source Sans Pro', sans-serif; padding-top: 10px;">
                        <?php echo $temp["ProductDescription"]; ?>
                    </textarea>

                </div>
            </div>

            <div class="chung_div">
                <div class="fr_tsp">
                    <p>Ảnh</p> <br>
                    <div class="anh_sanPham" style="width: 50%;">
                    <img src="<?php echo $temp["ImgProduct"]; ?>" alt="" style="width:50%; height:auto;">
                    </div><br>
                    <p style="color: #F05941;">Upload ảnh mới</p> <br>
                    <div style="width: 100%; padding: 1% 0%; border: 1px solid black;">
                        <input class="form-control"  type="file" name="file_tai_len" id="file_tai_len" style="padding-left: 10px;">
                    </div>
                </div>
            </div>

            <div class="chung_div">
                <div class="fr_tsp">
                    <p style="color: #176B87;">Giá sản phẩm</p> <br><br>
                    <p>Giá gốc</p>
                     <input type="text" name="giaGoc" id="giaGoc" oninput="formatCurrency(this)" value="<?php echo number_format($temp["Price"],0,',','.').'đ'  ?>"><br><br>
                     <p>Giá sale</p>
                     <input type="text" name="giaSale" id="giaSale" oninput="formatCurrency(this)" value="<?php echo number_format($temp["PriceSale"],0,',','.').'đ'  ?>"><br>
                     <p>Số lượng hàng còn</p>
                     <input type="text" name="quantity" id="quantity" value="<?php echo $temp["Quantity"]; ?>"><br>
                </div>
                </div>
                <div class="btn_ud_dl">
                <input type="submit" value="Lưu update" name="save_product" id="save_product">
                <input type="submit" value="Xóa sản phẩm" name="delete_product" id="delete_product">
                </form>
        </div>
            </div>
            
            
            
            
   
    
        </div>
        <!-- Thân trang -->
        <button id="myButton"  >Hỗ trợ sự cố</button>
        <?php include 'footer.php'; ?>
        
       </div>

    </div>
    <script>
        function formatCurrency(input) {
            let value = input.value.replace(/[^\d]/g, ''); // Loại bỏ tất cả các ký tự không phải số
            let formattedValue = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            // Thêm "đ" vào cuối
            formattedValue += "đ";
            // Cập nhật lại giá trị ô input đó 
            input.value = formattedValue;
            }
        </script>



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
           
            if (isset($_POST["save_product"])) {
                // ... (Các biến khác)
            
                $selectOption = $_POST["selectOption"];
                $name_sp = $_POST["name_sp"];
                $ma_sp = $_POST["ma_sp"];
                $motaSP  = $_POST["motaSP"];
                $giaGoc = $_POST["giaGoc"];
                $giaSale = $_POST["giaSale"];
                $quantity = $_POST["quantity"];

                // xử lý ký tự . với đ rồi ép sang Decimal để lưu ngược vào DB
                $price = intval(str_replace([".", "đ"], "", $giaGoc));
                $priceSale = intval(str_replace([".", "đ"], "", $giaSale));
                if ( empty($name_sp) || empty($motaSP) || empty($giaGoc) || empty($quantity)) {
                    echo "<script>alert('Vui lòng nhập đủ thông tin.')</script>";
                    return;
                }
                 // if (!isValidProductCode($name_sp)) {
                //     echo "<script>alert('Bạn nhập mã sản phẩm chưa hợp lệ mã phải từ 5 đến 20 ký tự và không soc dấu cách')</script>";
                //     return;
                // }
               
                if (!isPositiveNumber($quantity)) {
                    echo "<script>alert('Tại sao bạn nhập số < 0 cho trường số lượng')</script>";
                    return;
                }
                if (!isPositiveNumber($price)|| $price<0) {
                    echo "<script>alert('Giá gốc phải là dạng số')</script>";
                    return;
                }
                if (!is_numeric($priceSale) || $priceSale<0) {
                    echo "<script>alert('Giá sale phải là dạng số nguyên lớn hơn 0')</script>";
                    return;
                }
                if($giaGoc <$giaSale){
                    echo "<script>alert('Giá gốc đang để giá gốc bé hơn giá sale kìa')</script>";
                    return;
                }
            
                // ... (Kiểm tra các điều kiện khác)
            
                $tenFile = basename($_FILES["file_tai_len"]["name"]);
            
                // Xử lý upload ảnh
                if ($tenFile != "") {
                    $uploadDirectory = "upload/";
                    $targetFile = $uploadDirectory . basename($_FILES["file_tai_len"]["name"]);
                    $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);
                    $maxFileSize = 1 * 1024 * 1024;  // Kích thước tối đa: 1 MB
            
                    if ($_FILES["file_tai_len"]["error"] != 0) {
                        echo "Có lỗi khi tải lên tệp tin.";
                    } elseif (!in_array($fileType, array("jpg", "png"))) {
                        echo "<script>alert('Chỉ cho phép tải lên các tệp có đuôi là 'jpg' hoặc 'png')</script>";
                    } elseif ($_FILES["file_tai_len"]["size"] > $maxFileSize) {
                        echo "<script>alert('Kích thước tệp quá lớn. Upload file lỗi.')</script>";
                    } else {
                        move_uploaded_file($_FILES["file_tai_len"]["tmp_name"], $targetFile);
            
                        $sql_update = $conn->query("UPDATE product SET ProductName='$name_sp', ProductDescription='$motaSP',
                            Price='$price', PriceSale='$priceSale', Quantity ='$quantity', TypeID = '$selectOption', ImgProduct='$targetFile' 
                            WHERE Ma_SanPham = '$ma_sp'");
            
                        if ($sql_update) {
                            echo "<script>alert('Đã UPDATE lại thông tin sản phẩm và ảnh sản phẩm mới')</script>";
                            // Các xử lý và gán giá trị lại
                        } else {
                            echo $conn->error;
                        }
                    }
                } else {
                    $sql_update = $conn->query("UPDATE product SET ProductName='$name_sp', ProductDescription='$motaSP',
                    Price='$price', PriceSale='$priceSale', Quantity ='$quantity', TypeID = '$selectOption', ImgProduct='".$temp['ImgProduct']."' 
                    WHERE Ma_SanPham = '$ma_sp'");
                
                    if ($sql_update) {
                        echo "<script>alert('Update thành vẫn dữ ảnh sản phẩm cũ')</script>";
                        // Các xử lý và gán giá trị lại
                    } else {
                        echo $conn->error;
                    }
                }
            }
            
            ?>  
</body>
</html>
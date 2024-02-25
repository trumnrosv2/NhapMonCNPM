<?php

include 'connectDB.php';
$sql = $conn->query("SELECT product.*, brands.BranName
                     FROM product
                     INNER JOIN brands ON product.BrandID = brands.BrandID
                     LIMIT 13");
                     
$temp = $sql->fetch_assoc();
// print_r($sql);
?>

<div class="right" >
<?php    
    if(isset($_SESSION["inforloginnow"]["email"]) && $_SESSION["inforloginnow"]["email"] === "admin@gmail.com"){
        echo '<div class="container" >';
        while ($row = $sql->fetch_assoc()) {
            echo '
                <div class="inner-container" >
                    <div class="inner-box">
                        <a href="detail_product.php?Model=sanpham_admin&ProductID=' . $row["ProductID"] . '">
                        <img src="' . $row["ImgProduct"] . '" alt="" style="width: 100%; max-height: 230px;"><br>
                        <p class="tsp" style="font-size: 15px;">' . $row["ProductName"] . '</p>
                        <p class="thieu">' . $row["BranName"] . '</p>
                        <p class="giasp" style="color: #F45050;">' . number_format($row["Price"],0,',','.').'đ' . '</p>
                    </div>
                </div>';
        }
        echo '</div>';
        
    }else{
        echo '<div class="container">';
        while ($row = $sql->fetch_assoc()) {
            echo '
                <div class="inner-container">
                    <div class="inner-box">
                        <a href="detail_product.php?Model=sanpham&ProductID=' . $row["ProductID"] . '">
                        <img src="' . $row["ImgProduct"] . '" alt="" style="width: 100%; height: 180px;"><br>
                        <p class="tsp" style="font-size: 15px;">' . $row["ProductName"] . '</p>
                        <p class="thieu">' . $row["BranName"] . '</p>
                        <p class="giasp" style="color: #F45050;">' . number_format($row["Price"],0,',','.').'đ' . '</p>
                    </div>
                </div>';
        }
        echo '</div>';
    }
   
?>

    
</div>

<?php
if (isset($_GET['sort'])) {
    $sortOption = $_GET['sort'];
    
    // Thực hiện sắp xếp dữ liệu tùy thuộc vào giá trị của $sortOption
    switch ($sortOption) {
        case 'az':
            $sql = $conn->query("SELECT product.*, brands.BranName
            FROM product
            INNER JOIN brands ON product.BrandID = brands.BrandID
            ORDER BY product.ProductName ASC
            LIMIT 11");
             if(isset($_SESSION["inforloginnow"]["email"]) && $_SESSION["inforloginnow"]["email"] === "admin@gmail.com"){
        echo '<div class="container" >';
        while ($row = $sql->fetch_assoc()) {
            echo '
                <div class="inner-container" style="width: 22%">
                    <div class="inner-box">
                        <a href="detail_product.php?Model=sanpham_admin&ProductID=' . $row["ProductID"] . '">
                        <img src="' . $row["ImgProduct"] . '" alt="" style="width: 100%; height: 180px;"><br>
                        <p class="tsp" style="font-size: 15px;">' . $row["ProductName"] . '</p>
                        <p class="thieu">' . $row["BranName"] . '</p>
                        <p class="giasp" style="color: #F45050;">' . number_format($row["Price"],0,',','.').'đ' . '</p>
                    </div>
                </div>';
        }
        echo '</div>';
        
    }else{
        echo '<div class="container">';
        while ($row = $sql->fetch_assoc()) {
            echo '
                <div class="inner-container">
                    <div class="inner-box">
                        <a href="detail_product.php?Model=sanpham&ProductID=' . $row["ProductID"] . '">
                        <img src="' . $row["ImgProduct"] . '" alt="" style="width: 100%; height: 180px;"><br>
                        <p class="tsp" style="font-size: 15px;">' . $row["ProductName"] . '</p>
                        <p class="thieu">' . $row["BranName"] . '</p>
                        <p class="giasp" style="color: #F45050;">' . number_format($row["Price"],0,',','.').'đ' . '</p>
                    </div>
                </div>';
        }
        echo '</div>';
    }
   
            break;
        case 'za':
            // Sắp xếp theo tên Z-A
            break;
        case 'high-to-low':
            // Sắp xếp theo giá cao đến thấp
            break;
        case 'low-to-high':
            // Sắp xếp theo giá thấp đến cao
            break;
        default:
            // Xử lý mặc định khi không có tùy chọn nào được chọn
            break;
    }
}
?>
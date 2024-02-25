<?php
$sever= "localhost";
$username = "root";
$passwword ="";
$tenCSDL= "cnpm";   
// cnpm

$conn=mysqli_connect($sever, $username, $passwword, $tenCSDL) or die("Không thể kết nối tới cơ sở dữ liệu");
if (!$conn) {
    die("Kết nối tới cơ sở dữ liệu thất bại: " . mysqli_connect_error() . " Mã lỗi: " . mysqli_connect_errno());
}


?>
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
}
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    //echo$id;
    $query = "DELETE FROM cart WHERE id = '$id'";
    if ($conn->query($query) === TRUE) {
        //echo "<script>window.location = 'cart.php?UserID=$id_user"';</script>";
        header("Location: cart.php?UserID=" . $id_user);

    exit;

    } else {
        echo "Lỗi khi xóa dữ liệu: " . $conn->error;
    }
} else {
    echo "Không có ID cần xóa.";
}
?>

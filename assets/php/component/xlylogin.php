<?php 
    include("../config/connect.php");
    session_start();
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $pass = $_POST['password'];
            
            // Sử dụng prepared statement để ngăn chặn SQL Injection
            $sql = "SELECT * FROM `taikhoan` WHERE taikhoan = ? AND matkhau = ?";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("ss", $name, $pass);
            $stmt->execute();
            $result = $stmt->get_result();
            
            // Kiểm tra số hàng trả về
            if($result->num_rows > 0){
                // Đăng nhập thành công, chuyển hướng tới trang index.html
                header("location: /ktra2/index.html");
            } else {
                // Đăng nhập thất bại, chuyển hướng tới trang đăng nhập
                header("location: /ktra2/assets/pages/login.html");
            }
        }
    }

?>

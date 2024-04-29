<?php 
    session_start();
    include("./assets/php/config/connect.php");
    if(isset($_SESSION['name'])){


    } else{
        header("location: /ktra2/assets/pages/login.html");
    }

    if(isset($_GET['sign-out'])){
        session_destroy();
        header("location: /ktra2/assets/pages/login.html");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admine Dashboard</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <!-- ====================== Navigation ================ -->

    <div class="container">
        <?php include("./assets/pages/navigation.php")?>

        <!-- ================ Main =============== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
                <div class="user">
                    <img src="assets/images/avt.jpg" alt="">
                    <ul>
                        <li>Xin chào <?= $_SESSION['name'] ?></li>
                        <li><a href="index.php?sign-out">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="number">80</div>
                        <div class="cardName">Sales</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="number">$2,511</div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>
            <!-- ================= Charts JS ================ -->
            <?php 
                if($_SESSION['quyen'] == 1){
                    include("./assets/pages/chart.php");
                } 
            ?>

            <!--  ================Order Details List ================= -->
            <div class="records table-responsive">
                <div class="record-header">
                    <div class="add">
                        <span>Danh mục sản phẩm</span>

                        <form id="filterForm" method="POST">
                            <select id="danhmuc" name="maloai" title="Chọn danh mục sản phẩm">
                                <option value="">Tất cả sản phẩm</option>
                                <?php 
                                    $sql1 = "SELECT * FROM `danhmuc`";
                                    $stmt1 = $connect->prepare($sql1);
                                    $stmt1->execute();
                                    $result1 = $stmt1->get_result();
                                    while($fetch_dm = $result1->fetch_assoc()){
                                        // Kiểm tra xem giá trị của option có trùng với giá trị đã được chọn trước đó hay không
                                        $selected = ($fetch_dm['maloai'] == $_POST['maloai']) ? "selected" : "";
                                ?>
                                <!-- Thêm thuộc tính selected nếu giá trị của option trùng với giá trị đã chọn trước đó -->
                                <option value="<?= $fetch_dm['maloai'] ?>" <?= $selected ?>><?= $fetch_dm['tenloai'] ?></option>
                                <?php } ?>
                            </select>
                            <button type="submit" id="btnLoc">Lọc</button>
                        </form>
                    </div>

                    <div class="browse">
                       <input type="search" placeholder="Search" class="record-search">
                        <select name="" id="">
                            <option value="">Status</option>
                        </select>
                    </div>
                </div>

                <div>
                    
                    <table width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th><ion-icon name="chevron-expand-outline" data-name = "gianiemyet" class="sort-icon"></ion-icon> Giá</th>
                                <th><ion-icon name="chevron-expand-outline" data-name = "soluongton" class="sort-icon"></ion-icon> Số lượng</th>
                                <th><ion-icon name="chevron-expand-outline" data-name = "maloai" class="sort-icon"></ion-icon> Loại sản phẩm</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody id = "ketqua">
                            <?php 
                                if(isset($_POST['maloai']) and $_POST['maloai'] != ""){
                                    $maloai = $_POST['maloai'];
                                    $sql = "SELECT * FROM `sanpham` WHERE `maloai` = ?";
                                    $stmt = $connect->prepare($sql);
                                    $stmt->bind_param("s", $maloai);
                                } else {
                                    $sql = "SELECT * FROM `sanpham`";
                                    $stmt = $connect->prepare($sql);
                                }
                                $stmt->execute();
                                $result = $stmt->get_result();

                                while($row = $result->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?= $row['masp'] ?></td>
                                <td data-name = "tensp">
                                    <div class="client">
                                       <div class="client-img bg-img" style="background-image: url(img/3.jpeg)"></div>
                                        <div class="client-info">
                                            <h4><?=$row['tensp'] ?></h4>
                                        </div>
                                    </div>
                                </td>
                                <td data-name = "gianiemyet"><?=$row['gianiemyet'] ?>đ</td>
                                <td data-name = "soluongton">
                                    <span class="quantity-value"><?= $row['soluongton'] ?></span>
                                </td>
                                <td>
                                    <?php 
                                        if($row['maloai'] == 1) {
                                            echo "Phone";
                                        } elseif ($row['maloai'] == 2){
                                            echo "Laptop";
                                        } else{
                                            echo "Phụ kiện";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a href="">Cập nhật</a>
                                    <a href="">Xóa</a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>


    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.0.1/chart.umd.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="assets/js/chartJs.js"></script>
    <!-- Icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="assets/js/main.js"></script>   
</body>
</html>
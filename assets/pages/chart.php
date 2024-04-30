<div class="topbar">
    <div class="toggle">
        <ion-icon name="menu-outline"></ion-icon>
    </div>
    <!-- <div class="search">
        <label>
            <input type="text" placeholder="Search here">
            <ion-icon name="search-outline"></ion-icon>
        </label>
    </div> -->
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
        <?php 
            $select_sum_orders = "SELECT SUM(soluong) as TongDon FROM `chitietgiaodich`";
            $fetch_tong_don = $connect->query($select_sum_orders);
            if($fetch_tong_don->num_rows > 0){
                $row = $fetch_tong_don->fetch_assoc();
                $tong_don = $row['TongDon'];
            }
        
        ?>

        <div>
            <div class="number"><?= $tong_don ?></div>
            <div class="cardName">Tổng số đơn</div>
        </div>

        <div class="iconBx">
            <ion-icon name="cart-outline"></ion-icon>
        </div>
    </div>
    <div class="card">
        <?php 
            $select_sum_sale = "SELECT SUM(soluong * dongia) AS TongTien FROM `chitietgiaodich`";
            $fetch_tt = $connect->query($select_sum_sale);
            if($fetch_tt->num_rows > 0){
                $row = $fetch_tt->fetch_assoc();
                $tong_tien = $row['TongTien'];    
                $fomatTT = number_format($tong_tien, 0, '.', '.') . 'đ';
            }
        ?>
        <div>
            <div class="number"><?= $fomatTT ?></div>
            <div class="cardName">Tổng doanh thu</div>
        </div>

        <div class="iconBx">
            <ion-icon name="cash-outline"></ion-icon>
        </div>
    </div>
</div>
<div class="chartsBx">
    <div class="chart">
        <canvas id="chart-1"></canvas>
    </div>
    <div class="chart">
        <canvas id="chart-2"></canvas>
    </div>
</div>
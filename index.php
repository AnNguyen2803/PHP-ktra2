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
    if(isset($_POST['update_quantity'])) {
        $masp = $_POST['masp'];
        $new_quantity = $_POST['quantity'];

        $upd_quantity = "UPDATE `sanpham` SET soluongton = '$new_quantity' WHERE masp = '$masp'";
        $connect->query($upd_quantity);
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
    
    <div class="container">
        <!-- ====================== Navigation ================ -->
        <?php include("./assets/pages/navigation.php")?>

        <!-- ================ Main =============== -->
        <div class="main">
            <!-- ================= Charts JS ================ -->
            <?php 
                if($_SESSION['quyen'] == 1){
                    include("./assets/pages/chart.php");
                } 
            ?>

            <!--  ================Định tuyến cấu trúc trang ================= -->
            <?php include("route.php") ?>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.0.1/chart.umd.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        // /////////////// Char 1: top 5 hàng bán chạy nhất
        <?php 
            $labels = array();
            $data = array();
            $top5 = "SELECT sanpham.tensp, SUM(chitietgiaodich.soluong) as TongSoLuong FROM chitietgiaodich JOIN sanpham ON chitietgiaodich.masp = sanpham.masp GROUP BY sanpham.masp ORDER BY TongSoLuong DESC LIMIT 5";
            $fetch_top5 = $connect->query($top5);
            if($fetch_top5){
                while ($row = $fetch_top5->fetch_assoc()) {
                    $labels[] = $row['tensp'];
                    $data[] = $row['TongSoLuong'];
                }
            } else{
                echo "LỖI";
            }
        ?>
        const ctx1 = document.getElementById('chart-1');

        const data = {
        labels: <?php echo json_encode($labels) ?>,
        datasets: [{
        label: 'Top 5 sản phẩm bán chạy nhất',
        data: <?php echo json_encode($data) ?>,
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
        ],
        borderWidth: 1
        }]
        };

        new Chart(ctx1, {
        type: 'bar',
        data: data,
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            },
            responsive: true,
        }
        });

        // /////////////// Char 2: Số lượng tồn kho nhiều nhất
        <?php 
            $labels_ton_kho = array();
            $data_ton_kho = array();
            $top5_hang_ton = "SELECT tensp, soluongton FROM sanpham ORDER BY soluongton DESC LIMIT 5";
            $fetch_top5_ton_kho = $connect->query($top5_hang_ton);
            if($fetch_top5_ton_kho){
                while ($row = $fetch_top5_ton_kho->fetch_assoc()) {
                    $labels_ton_kho[] = $row['tensp'];
                    $data_ton_kho[] = $row['soluongton'];
                }
            } else{
                echo "LỖI";
            }
        ?>
        const ctx2 = document.getElementById('chart-2');  
        const data1 = {
            labels: <?php echo json_encode($labels_ton_kho) ?>,
            datasets: [{
            axis: 'y',
            label: 'Top 5 sản phẩm tồn kho nhiều nhất',
            data: <?php echo json_encode($data_ton_kho) ?>,
            fill: false,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
            ],
            borderWidth: 1
            }]
        };


        new Chart(ctx2, {
            type: 'bar',
            data: data1,
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            },
            responsive: true,
            indexAxis: 'y'
            }
        });
        

    </script>
    <!-- Icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="assets/js/main.js"></script>   
</body>
</html>
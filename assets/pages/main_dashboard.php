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
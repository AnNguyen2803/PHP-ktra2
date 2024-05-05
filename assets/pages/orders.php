<div class="records table-responsive">
    <div class="record-header">
        <div class="add">
            <span>Bảng hóa đơn</span>
        </div>
    </div>
    <div>
        <table width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mã hóa đơn</th>
                    <th>Loại</th>
                    <th><ion-icon name="chevron-expand-outline" data-name = "gianiemyet" class="sort-icon"></ion-icon> Đơn giá</th>
                    <th><ion-icon name="chevron-expand-outline" data-name = "soluongton" class="sort-icon"></ion-icon> Số lượng</th>
                    <th> Ngày giao dịch</th>
                    <th>Ghi chú</th>
                </tr>
            </thead>
            <tbody id = "ketqua">
                <?php 
                        $sql = "SELECT * FROM `chitietgiaodich`";
                        $stmt = $connect->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while($row = $result->fetch_assoc()){
                ?>
                <tr>
                    <form action = "" method = "post">
                        <td><?= $row['ID'] ?></td>
                        <h4><td><?= $row['mahd'] ?></td></h4>
                        <td><?= $row['loai'] ?></td>
                        <td data-name = "gianiemyet"><?=number_format($row['dongia'], 0, '.', '.') . 'đ' ?></td>
                        <td data-name = "soluongton">
                            <?= $row['soluong'] ?>
                        </td>
                        <td><?= $row['ngaygiaodich'] ?></td>
                        <td><?= $row['ghichu'] ?></td>
                    </form>
                </tr>
                <?php }?>
            </tbody>
        </table>
        
    </div>
</div>
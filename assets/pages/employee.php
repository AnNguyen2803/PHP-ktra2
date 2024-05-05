<div class="records table-responsive">
    <div class="record-header">
        <div class="add">
            <span>Bảng nhân viên</span>
        </div>
    </div>
    <div>
        <table width="100%">
            <thead>
                <tr>
                    <th>Mã nhân viên</th>
                    <th>Tên nhân viên</th>
                    <th>Địa chỉ</th>
                    <th>Ngày bắt đầu làm</th>
                </tr>
            </thead>
            <tbody Ma nhân viên = "manv">
                <?php 
                        $sql = "SELECT * FROM `nhanvien`";
                        $stmt = $connect->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while($row = $result->fetch_assoc()){
                ?>
                <tr>
                    <form action = "" method = "post">
                        <td><?= $row['manv'] ?></td>
                        <h4><td><?= $row['tennv'] ?></td></h4>
                        <td><?= $row['diachi'] ?></td>
                        <td><?= $row['ngaybatdaulam'] ?></td>
                    </form>
                </tr>
                <?php }?>
            </tbody>
        </table>
        
    </div>
</div>
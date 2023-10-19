<?php
require_once 'header.php';
$_SESSION['page'] = 'show_list';

if(isset($_GET['delect'])){
    $where =array(
        'reserve_action_id' => $_GET['delect']
    );
    $delect1 =$db->delete('reserve_action',$where);

    $delect2 =$db->delete('reserve_items',$where);
    if($delect2){
        js_alert('ปฏิเสธการจองที่นั่งโรงภาพยนตร์');
        js_redirect('request-list.php');
    }else{
        js_alert('ปฏิเสธการจองที่นั่งโรงภาพยนตร์ไม่สำเร็จ');
        js_redirect('request-list.php');
    }
}

?>
<?php require_once 'sidebar.php'; ?>

<div class="col py-3 d-flex justify-content-center">
    <div class="card w-75 shadow-lg border-0">
        <div class="card-body">
            <h3><b> เเสดงรายการขอจองที่นั่งโรงภาพยนตร์</b></h3>
            <div class="row my-3">
                <?php
                $sql = "SELECT * FROM users,reserve_action,reserve_items,theater_seats WHERE users.user_id = reserve_action.user_id AND reserve_items.reserve_action_id  = reserve_action.reserve_action_id  AND reserve_items.theater_seat_id = theater_seats.theater_seat_id AND reserve_action.status = 1";
                $result = mysqli_query($db->db , $sql);
            

                ?>
                <table class="table table-hover">
            <thead>
                <tr>
                    <th>ชื่อผู้ใช้</th>
                    <th>ที่นั่ง</th>
                    <th>สถานะ</th>
                    <th>จัดการที่นั่งโรงภาพยนตร์</th>
                </tr>
            </thead>
            <tbody >
                <?php
             
                foreach ($result as $row2) {
                ?>
                    <tr>
                        <td><?php echo $row2['firstname'] . ' ' . $row2['lastname'] ?></td>
                        <td><?php echo $row2['seat_name'] ?></td>
                        <td class="text-success">อนุญาติ</td>
                        <td>
                        <a onclick="return confirm('คุณต้องการปฏิเสธการจองที่นั่งโรงภาพยนตร์หรือไม่')" class="btn btn-danger" href="?delect=<?= $row2['reserve_action_id'] ?>">ปฏิเสธ</a>
                        </td>

                    </tr>
                <?php
                } ?>
            </tbody>
        </table>

          
            </div>
        </div>
    </div>

</div>
</div>
</div>
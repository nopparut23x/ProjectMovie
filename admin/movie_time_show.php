<?php
require_once 'header.php';
$_SESSION['page'] = 'movie_time_show';

$select = $db->view('movies');
if (isset($_GET['delect'])) {
    $ID = $_GET['delect'];
    $where = array(
        'movie_id' => $ID
    );
    $delect = $db->delete('movie_times', $where);
    if ($delect) {
        js_alert('ลบภาพยนตร์เรียบร้อย');
        js_redirect('movie_time_show.php');
    }
}

?>
<?php require_once 'sidebar.php'; ?>
<div class="col py-3 d-flex justify-content-center">
    <div class="card w-100 shadow-lg border-0">
        <div class="card-body">
            <h2>
                รายการเวลาฉายภาพยนตร์
            </h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>โปสเตอร์</th>
                        <th>ชื่อภาพยนตร์</th>
                        <th>เวลาเริ่มฉายภาพยนตร์</th>
                        <th>เวลาสิ้นสุดฉายภาพยนตร์</th>
                        <th>จัดการเวลาฉายภาพยนตร์</th>

                    </tr>
                </thead>
                <tbody class="">
                    <?php foreach ($select as $row) {
                        $where = array(
                            'movie_id' => $row['movie_id']
                        );
                        $select2 = $db->selectwhere('movie_times', $where);
                        foreach ($select2 as $row2) {
                    ?>

                            <tr>
                                <td><img src="<?php echo '../' . $row['poster'] ?>" class="w-50" height="200px"></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row2['start_time'] ?></td>
                                <td><?php echo $row2['end_time'] ?></td>
                                <td>
                                        <a onclick="return confirm('คุณต้องการลบเวลาฉายภาพยนตร์หรือไม่')" class="btn btn-danger" href="?delect=<?= $row['movie_id'] ?>"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                    <?php
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
</div>
</div>
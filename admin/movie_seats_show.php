<?php
require_once 'header.php';
$_SESSION['page'] = 'movie_seats_show';

$select = $db->view('theater_seats');
if (isset($_GET['delect'])) {
    $ID = $_GET['delect'];
    $where = array(
        'theater_seat_id' => $ID
    );
    $delect = $db->delete('theater_seats', $where);
    if ($delect) {
        js_alert('ลบภาพยนตร์เรียบร้อย');
        js_redirect('movie_seats_show.php');
    }
}
$result = $db->view('theater_plan');
foreach($result as $value);
?>
<?php require_once 'sidebar.php'; ?>
<div class="col py-3 d-flex justify-content-center">
    <div class="card w-100 shadow-lg border-0">
        <div class="card-body">
            
        <h2>รายการที่นั่งโรงภาพยนตร์</h2>
            <center>
            <img  src="<?php echo '../'.$value['img'] ?>" class="mt-5 w-50 shadow-sm" height="300px">
            </center>
            <table class="table table-hover mt-4">
                <thead>
                    <tr>
                        <th>ชื่อที่นั่งโรงภาพยนตร์</th>
                        <th>จัดการที่นั่งโรงภาพยนตร์</th>

                    </tr>
                </thead>
                <tbody class="">
                    <?php foreach ($select as $row) {
                   
                    ?>
                            <tr>
                                <td><?php echo $row['seat_name'] ?></td>
                                <td>
                                        <a onclick="return confirm('คุณต้องการลบเวลาฉายภาพยนตร์หรือไม่')" class="btn btn-danger" href="?delect=<?= $row['theater_seat_id'] ?>"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                    <?php
                        }?>
                </tbody>
            </table>
        </div>
    </div>

</div>
</div>
</div>
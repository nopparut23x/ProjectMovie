<?php
require_once 'header.php';

$where = array(
    'email' => $_SESSION['email']
);
$select = $db->selectwhere('users', $where);
foreach($select as $user);
foreach ($select as $row);

if (isset($_GET['ID'])) {
    $seat = $_GET['seat'];
    $ID = $_GET['ID'];
    $where = array(
        'movie_id' => $ID
    );
    $select_movie = $db->selectwhere('movies', $where);
    foreach ($select_movie as $value);
}



?>
<?php require_once 'sidebar.php'; ?>

<div class="col py-3 d-flex justify-content-center">
    <div class="card w-75 shadow-lg border-0">
        <div class="container">
            <br>
            <a href="seat_reservation.php" class="btn-close float-end"></a>
        <h3 class="text-center mt-3"><b>รายการภาพยนตร์</b> </h3>
        <center>
            <img src="<?php echo '../' . $value['poster'] ?>" class="w-75">
            <div class="card-body">
                <h2><?php echo $value['name'] ?></h2>
            </div>
        </center>
        <h4 class="text-center">
            <b>
                รายการเวลาฉายภาพยนตร์
            </b>
        </h4>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>เวลาเริ่มฉายภาพยนตร์</th>
                    <th>เวลาสิ้นสุดฉายภาพยนตร์</th>
                </tr>
            </thead>
            <tbody class="">
                <?php
                $select2 = $db->selectwhere('movie_times', $where);
                foreach ($select2 as $row2) {
                ?>
                    <tr>
                        <td><?php echo $row2['start_time'] ?></td>
                        <td><?php echo $row2['end_time'] ?></td>

                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
        <h4 class="text-center mt-3">
            <b>
            ภาพผังที่นั่งโรงภาพยนตร์
            </b>
        </h4>
     
        <?php
        $result = $db->view('theater_plan');
        foreach ($result as $value3);
        ?>
        <center>
            <img src="<?php echo '../' . $value3['img'] ?>" class="mt-5 w-50" height="300px">
        </center>
        <hr>
        <h5>
            ที่นั่งโรงภาพยนตร์
        </h5>
        <h4><?php echo  $seat ?></h4>
    </div>
    </div>

</div>
</div>
</div>
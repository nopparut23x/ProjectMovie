<?php
require_once 'header.php';

$where = array(
    'email' => $_SESSION['email']
);
$select = $db->selectwhere('users', $where);
foreach($select as $user);
foreach ($select as $row);

if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];
    $where = array(
        'movie_id' => $ID
    );
    $select_movie = $db->selectwhere('movies', $where);
    foreach ($select_movie as $value);
}

if(isset($_POST['submit'])){
    if(empty($_POST['seats'])){
        js_alert('กรุณาเลือกที่นั่ง');
    }else{
   echo  $seats = $_POST['seats'];
   echo $movie_time = $_POST['movie_time'];
    
    $fields = array(
        'reserve_action_id'=> '',
        'user_id' => $user['user_id'],
        'movie_time_id'=> $movie_time,
        'status' => 0
    );
    $save = $db->save('reserve_action',$fields);
    if($save){
        $reserve_action_id = mysqli_insert_id($db->db) ;
        $seats = implode(',',$seats);
        $fields2 = array(
            'reserve_item_id' =>'', 
            'reserve_action_id'=>$reserve_action_id, 
            'theater_seat_id' => $seats
        );
    $save2 = $db->save('reserve_items',$fields2);
    if($save2){
        js_alert('จองที่นั่งโรงภาพยนตร์สำเร็จ');
        js_redirect('homepage.php');
    }

    }else{
        js_alert('จองที่นั่งโรงภาพยนตร์ไม่สำเร็จ');
        js_redirect('homepage.php');
    }
}
}

?>
<?php require_once 'sidebar.php'; ?>

<div class="col py-3 d-flex justify-content-center">
    <div class="card w-75 shadow-lg border-0">
        <div class="container">
        <br>
            <a href="homepage.php" class="btn-close float-end"></a>
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
        <form method="post">
            <h4 class="mt-3">เลือกที่นั่งโรงภาพยนตร์</h4>
            <input type="hidden" name="movie_time" value="<?php echo $row2['movie_time_id'] ?>">

            <?php 
            $items2 = $db->view('theater_seats');
            foreach ($items2 as $item) : ?>
            
                <input type="checkbox" name="seats[]" id="seats<?= $item['theater_seat_id'] ?>" value="<?= $item['theater_seat_id'] ?>" class="mt-3" style="transform: scale(1.5);">
                <label for="seats<?= $item['theater_seat_id'] ?>" class="mr-5"><?= $item['seat_name'] ?></label>
            <?php endforeach; ?>
            <div class="mt-3">
                <button type="submit" name="submit" class="btn btn-primary my-5">จองที่นั่งโรงภาพยนตร์</button>
            </div>
            </form>
    </div>
    </div>

</div>
</div>
</div>
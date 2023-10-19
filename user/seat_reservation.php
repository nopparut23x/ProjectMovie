<?php
require_once 'header.php';
$_SESSION['page'] = 'seat_reservation';
$where = array(
    'email' => $_SESSION['email']
);
$select = $db->selectwhere('users', $where);
foreach ($select as $row);
$id_user = $row['user_id'];

if(isset($_GET['delect'])){
    $id = $_GET['delect'];
    $where_delect = array(
        'reserve_action_id' => $id
    );
    $delect = $db->delete('reserve_action',$where_delect);
    $delect2 = $db->delete('reserve_items',$where_delect);
    if($delect2){
        js_alert('ลบสำเร็จ');
        js_redirect('seat_reservation.php');
    }
}
?>
<?php
require_once 'sidebar.php';
?>

<div class="col py-3 d-flex justify-content-center">
    <div class="card w-75 shadow-lg border-0">
        <div class="card-body">
            <h3><b> ยินดีต้อนรับ <?php echo $row['firstname'] . ' ' . $row['lastname'] ?></b></h3>
    <?php
                        $sql = "SELECT * FROM reserve_action,users,movie_times,theater_seats,reserve_items,movies WHERE reserve_action.user_id = users.user_id AND reserve_action.movie_time_id = movie_times.movie_time_id AND reserve_action.reserve_action_id = reserve_items.reserve_action_id AND movies.movie_id = movie_times.movie_id  AND reserve_items.theater_seat_id = theater_seats.theater_seat_id AND reserve_action.status ='1' AND users.user_id ='$id_user'";
                        $result = mysqli_query($db->db, $sql);
                        $num_row =mysqli_num_rows($result);
                        if($num_row == 0){
                            ?>
                            <center>
                            <!-- <h2 class="my-5">ไม่มีรายการจองที่นั่งโรงหนัง</h2> -->
                            </center>
                        <?php }
                        else{
                            ?><h5>รายการจองที่นั่งที่อนุญาติเเล้ว<h5>
                            <div class="row my-5">
                                <?php foreach ($result as $value) {
                        ?>
                           
                            <div class="col-md-4">
                                <div class="card">
                                    <img class="card-img-top" src="<?php echo '../' . $value['poster'] ?>" alt="Card image" style="width:100%">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $value['name'] ?></h4>
                                        <a href="detail_user.php?ID=<?php echo $value['movie_id']?>&seat=<?php echo $value['seat_name'] ?>" class="btn btn-primary">ดูรายระเอียด</a>
                                        <a href="?delect=<?php echo $value['reserve_action_id'] ?>" class="btn btn-danger">ยกเลิก</a>
                                    </div>
                                </div>
                            </div>
                        <?php }} ?>
                    
                        <hr class="my-4">
                        <h5>รายการจองที่นั่งที่รอการอนุญาติ<h5>
                                <div class="row my-5">
                                    <?php
                                    $sql_2 = "SELECT * FROM reserve_action,users,movie_times,theater_seats,reserve_items,movies WHERE reserve_action.user_id = users.user_id AND reserve_action.movie_time_id = movie_times.movie_time_id AND reserve_action.reserve_action_id = reserve_items.reserve_action_id AND movies.movie_id = movie_times.movie_id  AND reserve_items.theater_seat_id = theater_seats.theater_seat_id AND reserve_action.status ='0' AND users.user_id ='$id_user'";
                                    $result_2 = mysqli_query($db->db, $sql_2);
                                   
                                    foreach ($result_2 as $value) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img class="card-img-top" src="<?php echo '../' . $value['poster'] ?>" alt="Card image" style="width:100%">
                                                <div class="card-body">
                                                    <h4 class="card-title"><?php echo $value['name'] ?></h4>
                                                    <a href="?delect=<?php echo $value['reserve_action_id'] ?>" class="btn btn-danger">ยกเลิก</a>

                                                </div>
                                            </div>
                                        </div>
                                    <?php 
                                } ?>
                                </div>
                    </div>
        </div>

    </div>
</div>
</div>
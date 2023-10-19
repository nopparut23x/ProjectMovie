<?php
require_once 'header.php';
$_SESSION['page'] = 'movie_time_add';

$select = $db->view('movies');
if(isset($_POST['movie'])){
    $fields = array(
        'movie_time_id' => '',
        'movie_id' =>$_POST['movie_select'], 
        'start_time' =>$_POST['time_start'],
        'end_time' =>$_POST['time_end'],   
            );
            $issert = $db->save('movie_times',$fields);
            if($issert){
            js_alert('เพิ่มเวลาฉายหนังเรียบร้อย');
            js_redirect('movie_time_add.php');
            }
}
?>
<?php require_once 'sidebar.php'; ?>
<div class="col py-3 d-flex justify-content-center">
    <div class="card w-100 my-5 shadow-lg border-0 rounded-0">
        <div class="card-body">
            <h2>เพิ่มเวลาฉายภาพยนตร์</h2>
            <form method="post" class="w-75 m-auto mt-5">
                <label for="movie" class="form-label">เลือกภาพยนตร์</label>
                <select class="form-select" id="movie" name="movie_select">
                    <?php
                    foreach ($select as $row) {
                    ?>
                        <option value="<?php echo $row['movie_id'] ?>"><?php echo $row['name'] ?></option>
                    <?php } ?>
                </select>

                <div class="mb-3 mt-3">
                <label for="time_start">เวลาเริ่มฉายภาพยนตร์:</label>
                <input type="datetime-local" class="form-control rounded-0" id="time_start" name="time_start" required>
                </div>

                <div class="mb-3 mt-3">
                <label for="time_end">เวลาสิ้นสุดฉายภาพยนตร์:</label>
                <input type="datetime-local" class="form-control rounded-0" id="time_end" name="time_end" required>
                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button type="submit" class="btn btn-primary" name="movie">บันทึก</button>
                </div>
            </form>
        </div>
    </div>

</div>
</div>
</div>
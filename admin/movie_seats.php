<?php
require_once 'header.php';
$_SESSION['page'] = 'movie_seats';

$result = $db->view('theater_plan');
foreach ($result as $value);
if(isset($_POST['seats_save'])){
    $fields =array(
            'seat_name' => $_POST['seats'],
    );
    $issert = $db->save('theater_seats', $fields);
    if($issert){
        js_alert('เพิ่มที่นั่งเรียบร้อย');
        js_redirect('movie_seats.php');
    }
}
?>
<?php require_once 'sidebar.php'; ?>
<div class="col py-3 d-flex justify-content-center">
    <div class="card shadow-lg border-0 rounded-0 w-75 " style="height: 600px;">
        <div class="card-body">
            <h2>ภาพผังที่นั่งโรงภาพยนตร์</h2>
            <form method="POST" enctype="multipart/form-data" class="m-auto">
               
                <center>
                        <img src="<?php echo '../' . $value['img'] ?>" class="mt-5 w-50" height="300px">
                </center>

          
                    <p>ชื่อที่นั่งโรงภาพยนตร์:</p>
                    <input type="text"  class="form-control w-100 mt-3" name="seats" accept="image/*">
                
                <div class="d-flex justify-content-center mt-5">
                    <button type="submit" class="btn btn-primary" name="seats_save">บันทึก</button>
                </div>

            </form>

        </div>
    </div>

</div>
</div>
</div>
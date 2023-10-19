<?php
require_once 'header.php';
$_SESSION['page'] = 'movie_chart';

if (isset($_POST['movie'])) {
    if (!empty($_FILES['chart']['name'])) {
        $file = $db->upload($_FILES['chart'], 'assets/img');
    } else {
        $file = 'assets/img/movie.png';
    }
    $data = array(
        'img' => $file
    );
    $issert = $db->save('theater_plan', $data);
    if ($issert) {
        js_alert('ภาพผังที่นั่งโรงภาพยนตร์');
        js_redirect('movie_chart.php');
    }
}
$result = $db->view('theater_plan');
foreach($result as $value);
?>
<?php require_once 'sidebar.php'; ?>
<div class="col py-3 d-flex justify-content-center">
    <div class="card shadow-lg border-0 rounded-0 w-75">
        <div class="card-body">
            <h2>ภาพผังที่นั่งโรงภาพยนตร์</h2>
            <form method="POST" enctype="multipart/form-data" class="m-auto">
                <div class="mb-3 mt-3">
                    <center>
                        <img src="<?php echo '../'.$value['img'] ?>" class="mt-5 w-50" height="300px">
                        <div class="mb-3 mt-3">
                            <label for="moviename">เลือกภาพผังที่นั่งโรงภาพยนตร์:</label>
                            <input type="file" class="form-control w-50 mt-3" name="chart" accept="image/*">
                        </div>
                </div>
                </center>


                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" name="movie">บันทึก</button>
                </div>

            </form>

        </div>
    </div>

</div>
</div>
</div>
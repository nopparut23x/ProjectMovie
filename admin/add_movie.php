<?php
require_once 'header.php';
$_SESSION['page'] = 'add_movie';

if (isset($_POST['movie'])) {
    if(!empty($_FILES['poster']['name'])){
        $file = $db->upload($_FILES['poster'], 'assets/img');
    }else{
        $file = 'assets/img/movie.png';
    }
    $data = array(
        'name' => $_POST['moviename'],
        'poster' => $file
    );
    $issert = $db->save('movies', $data);
    if ($issert) {
        js_alert('เพิ่มภาพยนตร์');
        js_redirect('add_movie.php');
    }
}
?>
<?php require_once 'sidebar.php'; ?>
<div class="col py-3 d-flex justify-content-center">
    <div class="card shadow-lg border-0 rounded-0 w-75">
        <div class="card-body">
            <h2>เพิ่มภาพยนตร์</h2>
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                    <center>
                        <img src="../assets/img/movie.png" class="mt-5" style="width: 100px;">
                        <input type="file" class="form-control w-25 mt-3" name="poster" accept="image/*">
                </div>
                </center>

                <div class="mb-3 mt-3">
                    <label for="moviename">ชื่อภาพยนตร์:</label>
                    <input type="text" class="form-control rounded-0"  id="moviename" name="moviename" required>
                </div>
                
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" name="movie">เพิ่มภาพยนตร์</button>
                </div>

            </form>

        </div>
    </div>

</div>
</div>
</div>
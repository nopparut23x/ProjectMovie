<?php
require_once 'header.php';
$_SESSION['page'] = 'movie_all';

$select = $db->view('movies');

if (isset($_GET['delect'])) {
    $ID = $_GET['delect'];
    $where = array(
        'movie_id' => $ID
    );

    $delect = $db->delete('movies', $where);
    if ($delect) {
        js_alert('ลบภาพยนตร์เรียบร้อย');
        js_redirect('movie_all.php');
    }
}
if(isset($_POST['movie'])){
    $where = array(
        'movie_id' => $_POST['id']
    );
    if (!empty($_FILES['poster']['name'])) {
        $file = $db->upload($_FILES['poster'], '/assets/img');
        $update = $db->update('movies', ['poster' => $file], $where);
        if ($update) {
            // js_alert('เเก้ไขรูปภาพสำเร็จ');
            // js_redirect('admin_edit.php');
        }
    }

 
    $data = array(
        'name' => $_POST['moviename'],
    );
    $issert = $db->update('movies', $data, $where);
    if ($issert) {
        js_alert('เเก้ไขภาพยนตร์เรียบร้อย');
        js_redirect('movie_all.php');
    }
}

?>
<?php require_once 'sidebar.php'; ?>
<div class="col py-3 d-flex justify-content-center">
    <div class="card shadow-lg border-0 rounded-0 w-75">
        <div class="card-body">
            <h2>ภาพยนตร์</h2>
            <div class="row  mt-5">
                <?php foreach ($select as $row) { ?>
                    <div class="col-md-4 md-3 mb-3">
                        <div class="card">
                            <center>
                                <img src="<?= '../' . $row['poster']; ?>" class="img-on-top w-75 mt-3" style="height: 200px;">
                            </center>
                            <div class="card-body">
                                <div class="py-3 text-center">
                                    <h3><?= $row['name'] ?></h3>
                                    <span class="d-inline">สถานะ:</span>
                                    <p class="d-inline text-success " style="font-weight: bold;">กำลังใช้งาน</p>

                                </div>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-warning" data-bs-target="#mymodal<?= $row['movie_id'] ?>" data-bs-toggle="modal">เเก้ไขภาพยนตร์</a>
                                <a onclick="return confirm('คุณต้องการลบภาพยนตร์หรือไม่')" class="btn btn-danger" href="?delect=<?= $row['movie_id'] ?>">ลบภาพยนตร์</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal" id="mymodal<?= $row['movie_id'] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2>ภาพยนตร์</h2>
                                </div>
                                <div class="modal-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="mb-3 mt-3">
                                                <center>
                                                    <img src="<?= '../' . $row['poster']; ?>" class="mt-5 w-50 rounded-0" height="200px">
                                                    <p>รูปภาพยนตร์</p>
                                                    <input type="file" accept="image/*"  class="form-control w-100 mt-3" name="poster">
                                            </div>
                                            </center>

                                            <div class="mb-3 mt-3">
                                                <label for="moviename">ชื่อภาพยนตร์:</label>
                                                <input type="text" class="form-control rounded-0" id="moviename" name="moviename" value="<?= $row['name'] ?>" required>
                                                <input type="hidden"  name="id" value="<?= $row['movie_id'] ?>" >
                                            </div>



                                </div>
                                <div class="modal-footer">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-warning" name="movie">เเก้ไขภาพยนตร์</button>
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

</div>
</div>
</div>
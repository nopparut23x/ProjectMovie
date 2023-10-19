<?php
require_once 'header.php';
$_SESSION['page'] = 'users_online';

$where = array(
    'user_type' => 'user',
    'status' => 1
);
$select = $db->selectwhere('users', $where);
if(isset($_GET['id'])){
    $ID = $_GET['id'];
    $where2 = array(
        'user_id' => $ID
    );
    $fields = array(
        'status' => '-1'
    );
    $update = $db->update('users',$fields,$where2);
    if($update){
        js_alert('ระงับการใช้งานเรียบร้อย');
        js_redirect('users_offline.php');
    }
}
?>
<?php require_once 'sidebar.php'; ?>
<div class="col py-3 d-flex justify-content-center">
    <div class="card shadow-lg border-0 rounded-0 w-75">
        <div class="card-body">
            <h2>ข้อมูลผู้ใช้งาน</h2>
            <div class="row">
                <?php foreach ($select as $row){ ?> 
                <div class="col-md-4 md-3 mb-3">
                    <div class="card">
                        <center>
                        <img src="<?= '../'.$row['profile']; ?>" class="img-on-top w-75 mt-3" style="height: 200px;">
                        </center>
                        <div class="card-body">
                            <div class="py-3 text-center">
                                <h3><?= $row['firstname'] . "  " . $row['lastname']; ?></h3>
                                <span class="d-inline">สถานะ:</span>
                                <p class="d-inline text-success " style="font-weight: bold;">กำลังใช้งาน</p>

                            </div>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-danger" href="?id=<?= $row['user_id'] ?>">ระงับการใช้งานผู้ใช้งาน</a>
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
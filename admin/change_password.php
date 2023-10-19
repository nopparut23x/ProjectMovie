<?php
require_once 'header.php';
$_SESSION['page'] = 'change_password';

$where = array(
    'email' => $_SESSION['email']
);
$select = $db->selectwhere('users', $where);
foreach ($select as $row);

if (isset($_POST['password_edit'])) {
    $password = MD5($_POST['old_password']);
    if ($password == $row['password']) {
        if($_POST['new_password'] == $_POST['confirm_password']){
        $fields = array(
            'password' => MD5($_POST['new_password'])
        );
        $update = $db->update('users',$fields,$where);
        if($update){
            js_alert('เปลี่ยนรหัสผ่านเรียบร้อย');
            js_redirect('change_password.php');

        }
       }else{
        js_alert('รหัสไม่ตรงกัน');
        js_redirect('change_password.php');

       }

    }else{
        js_alert('รหัสผ่านเดิมไม่ถูกต้อง');
        js_redirect('change_password.php');
    }
}

?>
<?php require_once 'sidebar.php'; ?>

<div class="col py-3 d-flex justify-content-center">
    <div class="card w-75 shadow-lg border-0">
        <div class="card-body">
            <form action="" method="post">
                <h1>เปลี่ยนรหัสผ่าน</h1>
                <div class="mb-3 mt-3">
                    <p>รหัสผ่านเดิม :</p>
                    <input type="password" name="old_password" required class="form-control" required>
                </div>
                <div class="mb-3 mt-3">
                    <p>รหัสผ่านใหม่ :</p>
                    <input type="password" name="new_password" required class="form-control" required>
                </div>
                <div class="mb-3 mt-3">
                    <p>ยืนยันรหัสผ่าน :</p>
                    <input type="password" name="confirm_password" required class="form-control" required>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-warning mt-4" type="submit" name="password_edit">
                        บันทึก
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
</div>
</div>
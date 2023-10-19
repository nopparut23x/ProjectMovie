<?php
require_once 'header.php';
$_SESSION['page'] = 'edit_profile';

$where = array(
    'email' => $_SESSION['email']
);
$select = $db->selectwhere('users', $where);
foreach ($select as $row);

if (isset($_POST['summit'])) {
    if (!empty($_FILES['profile']['name'])) {
        $file = $db->upload($_FILES['profile'], 'assets/img');
        $update = $db->update('users', ['profile' => $file], $where);
        if ($update) {
            // js_alert('เเก้ไขรูปภาพสำเร็จ');
            // js_redirect('admin_edit.php');
        }
    }
    $data = array(
        'firstname' => $_POST['firstname'],
        'lastname' => $_POST['lastname'],
        'email' => $_POST['email'],
    );
    $issert = $db->update('users', $data, $where);
    if ($issert) {
        js_alert('เเก้ไขข้อมูลส่วนตัวสำเร็จ');
        js_redirect('admin_edit.php');
    }
    $_SESSION['email'] = $_POST['email'];
}
?>
<?php require_once 'sidebar.php'; ?>

<div class="col py-3 d-flex justify-content-center">
    <div class="card shadow-lg border-0 rounded-0 w-75">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <h2 class="text-primary">ระบบสำรองที่นั่งโรงภาพยนต์</h2>

                <div class="mb-3 mt-3">
                    <center>
                        <img src="<?php echo '../' . $row['profile'] ?>" class="mt-5 rounded-circle" height="200px" width="200px">
                        <input type="file" class="form-control w-75 mt-3" name="profile">
                </div>
                </center>

                <div class="mb-3 mt-3">
                    <label for="firstname">ชื่อ:</label>
                    <input type="text" class="form-control rounded-0" id="firstname" name="firstname" required value="<?php echo $row['firstname'] ?>">
                </div>
                <div class="mb-3 mt-3">
                    <label for="lastname">นามสกุล:</label>
                    <input type="text" class="form-control rounded-0" id="lastname" name="lastname" required value="<?php echo $row['lastname'] ?>">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email">อีเมล:</label>
                    <input type="email" class="form-control rounded-0" id="email" name="email" required value="<?php echo $row['email'] ?>">
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" name="summit" class="btn btn-primary">เเก้ไขข้อมูลส่วนตัว</button>
                </div>

            </form>
        </div>
    </div>

</div>
</div>
</div>
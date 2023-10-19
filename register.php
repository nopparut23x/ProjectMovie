<?php
require_once "header.php";


if(isset($_POST['register'])){
    $email =  $_POST['email'];
    $select = $db->view('users');
    foreach($select as $row){
    if($row['email'] == $email){
    js_alert('อีเมลนี้ถูกใช้งานเเล้ว');
    js_redirect('register.php');
    }
}
if(!empty($_FILES['profile']['name'])){
    $file = $db->upload($_FILES['profile'], 'assets/img');
}else{
    $file = 'assets/img/def.png';
}


    $data = array(
    'firstname' => $_POST['firstname'],
    'lastname' => $_POST['lastname'],
    'email' => $_POST['email'],
    'profile' => $file,
    'password' => MD5($_POST['password']),
    'user_type'=>'user',
    'status'=>'0'
);

$issert = $db->save('users',$data);
if($issert){
    js_alert('ลงทะเบียนสำเร็จรอการยืนยัน');
    js_redirect('index.php');
}
}


?>
<div class="container">
    <div class="card my-5  shadow-lg border-0 rounded-0">
        <div class="card-body">
            <a href="index.php" style="float: right;"><button class="btn-close"></button></a>
            <br>
            <h3 class="text-center">สมัครสมาชิก</h3>
            <form  method="POST" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                    <center>
                        <img src="assets/img/def.png" class="mt-5" style="width: 100px;">
                        <input type="file" class="form-control w-25 mt-3" name="profile">
                </div>
                </center>
            <h2 class="text-primary">ระบบสำรองที่นั่งโรงภาพยนต์</h2>

                <div class="mb-3 mt-3">
                    <label for="firstname">ชื่อ:</label>
                    <input type="text" class="form-control rounded-0" id="firstname" name="firstname" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="lastname">นามสกุล:</label>
                    <input type="text" class="form-control rounded-0" id="lastname" name="lastname" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="email">อีเมล:</label>
                    <input type="email" class="form-control rounded-0" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="pwd">รหัสผ่าน:</label>
                    <input type="password" class="form-control rounded-0" id="pwd" name="password" required>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" name="register">เข้าสู่ระบบ</button>
                </div>

            </form>

        </div>
    </div>
</div>
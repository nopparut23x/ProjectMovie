<?php  
if(isset($_POST['login'])){
    
     $email = $_POST['email'];
    $password = MD5($_POST['password']);
    $login = $db->login($email,$password);
    if($login){
    }
    else{
        
    }
}
?>


<div class="container">
    <div class="card my-5  shadow-lg border-0 rounded-0">
        <div class="card-body">
            <h3 class="text-center">เข้าสู่ระบบ</h3>
            <h2>ระบบสำรองที่นั่งโรงภาพยนต์</h2>

            <form action="index.php" method="POST">
                <div class="mb-3 mt-3">
                    <label for="email">อีเมล:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="pwd">รหัสผ่าน:</label>
                    <input type="password" class="form-control" id="pwd" name="password" required>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" name="login" class="btn btn-primary">เข้าสู่ระบบ</button>
                </div>

            </form>
            <div class="text-center mt-3">
                ยังไม่มีบัญชี? <a href="register.php">สร้างบัญชีของคุณ</a>
            </div>
        </div>
    </div>
<hr>
<footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © โครงการ เเผนกวิชาเทคโนโลยีสารสนเทศ
    <a class="text-dark" href="">นายนพรัตน์ อินมี</a>
  </div>
  <!-- Copyright -->
</footer>
</div>

<?php
require_once 'header.php';
$_SESSION['page'];

?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item" >
                        <a href="homepage.php" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline menu-top">หน้าหลัก</span>
                        </a>
                    </li>
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fa-solid fa-user text-secondary"></i> <span class="ms-1 d-none d-sm-inline menu-top">การจองที่นั่ง</span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100 menu_item px-1 <?= $_SESSION['page'] === 'seat_reservation' ? 'bg-primary' : '' ?>">
                                <a href="seat_reservation.php" class="nav-link px-0 text-light "> <span class="d-none d-sm-inline "></span>การจองที่นั่ง</a>
                            </li>
                           
                        </ul>
                    </li>
                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fa-solid fa-user text-secondary"></i> <span class="ms-1 d-none d-sm-inline menu-top">ข้อมูลส่วนตัว</span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100 menu_item px-1 <?= $_SESSION['page'] === 'edit_profile' ? 'bg-primary' : '' ?>">
                                <a href="user_edit.php" class="nav-link px-0 text-light "> <span class="d-none d-sm-inline "></span>เเก้ไขข้อมูลส่วนตัว</a>
                            </li>
                            <li class="w-100 menu_item px-1 <?= $_SESSION['page'] === 'change_password' ? 'bg-primary' : '' ?>">
                                <a href="change_password.php" class="nav-link px-0 text-light "> <span class="d-none d-sm-inline "></span>เเก้ไขรหัสผ่าน</a>
                            </li>
                        </ul>
                    </li>
              
                    <a onclick="return confirm('คุณต้องการออกจากระบบหรือไม่')" href="logout.php" class="d-flex align-items-center text-danger text-decoration-none my-5">
                        <i class="fas fa-sign-out"></i>
                        <span class="ms-1 d-none d-sm-inline">ออกจากระบบ</span>
                    </a>
                </ul>

            </div>
        </div>
<?php
require_once 'header.php';
$_SESSION['page'] = 'homepage';
$where = array(
    'email' => $_SESSION['email']
);
$select = $db->selectwhere('users', $where);
foreach ($select as $row);

?>
<?php 
require_once 'sidebar.php';
?>

<div class="col py-3 d-flex justify-content-center">
    <div class="card w-75 shadow-lg border-0">
        <div class="card-body">
            <h3><b> ยินดีต้อนรับ <?php echo $row['firstname'] . ' ' . $row['lastname'] ?></b></h3>
            <div class="row my-3">
                <p>รายการภาพยนตร์</p>
                <?php
                $select_time =$db->view('movie_times');
                foreach ($select_time as $value1){
                    $where2 =array(
                        'movie_id' => $value1['movie_id']
                    );
                $select_movie = $db->selectwhere('movies',$where2);
                foreach ($select_movie as $value) {
                
               
                ?>
                    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo '../'.$value['poster'] ?>" alt="Card image" style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $value['name'] ?></h4>
                                <a href="detail.php?ID=<?php echo $value['movie_id'] ?>" class="btn btn-primary">ดูรายระเอียด</a>
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>
            </div>
        </div>
    </div>

</div>
</div>
</div>
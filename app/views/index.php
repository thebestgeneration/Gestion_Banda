<?php require_once('../../config/config.php'); ?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<?php require_once('../includes/header.php') ?>
<body class="">
    <?php require_once('../includes/navigation.php') ?>
    <div class="page-wrapper">
        <?php require_once('../includes/topbarnav.php') ?>
        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">
            <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                if(!file_exists($page.".php") && !is_dir($page)){
                    include '404.html';
                }else {
                    if(is_dir($page))
                        include $page.'/index.php';
                    else 
                        include $page.'.php';
                }
            ?>
            </div><!-- container -->
            
            <?php require_once('../includes/footer.php') ?>
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->
</body>
</html>
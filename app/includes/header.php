<?php
require_once('authorize_session.php');
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title id="title"></title>
    <link rel="icon" id="ic" />

    <!-- COMPLEMENTOS CSS -->

    <!--complemento bootstrap-->
    <link rel="stylesheet" href="<?php echo base_url ?>plugins/bootstrap/css/bootstrap-dark.min.css">
    <!--complemento Iconos de Font-Awesome, Themify, Material Design Icons, etc-->
    <link rel="stylesheet" href="<?php echo base_url ?>plugins/icons/css/icons.min.css">
    <!--complemento MestisMenu-->
    <link rel="stylesheet" href="<?php echo base_url ?>plugins/metismenu/css/metismenu.min.css">
    <!--complemento DateRangePicker-->
    <link rel="stylesheet" href="<?php echo base_url ?>plugins/daterangepicker/daterangepicker.css">
    <!--complemento SweetAlert2-->
    <link rel="stylesheet" href="<?php echo base_url ?>plugins/sweetalert2/css/sweetalert2.min.css">
    <!-- complemento para el sistema -->
    <link rel="stylesheet" href="<?php echo base_url ?>assets/css/app.min.css">
    <!-- complemento para la vista system -->
    <link rel="stylesheet" href="<?php echo base_url ?>assets/css/system.css">

    <!-- COMPLEMENTOS JS -->

    <!--complemento JQuery-->
    <script src="<?php echo base_url ?>plugins/jquery/jquery.min.js"></script>
    <!-- complemento bootstrap -->
    <script src="<?php echo base_url ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- complemento MetisMenu -->
    <script src="<?php echo base_url ?>plugins/metismenu/js/metismenu.min.js"></script>
    <!-- complemento Feather -->
    <script src="<?php echo base_url ?>plugins/feather/feather.min.js"></script>
    <!-- complemento SimpleBar -->
    <script src="<?php echo base_url ?>plugins/simplebar/simplebar.min.js"></script>
    <!-- complemento Moment -->
    <script src="<?php echo base_url ?>plugins/moment/moment.js"></script>
    <!-- complemento DateRangePicker -->
    <script src="<?php echo base_url ?>plugins/daterangepicker/daterangepicker.js"></script>
    <!-- complemento Sweetalert2 -->
    <script src="<?php echo base_url ?>plugins/sweetalert2/js/sweetalert2.all.min.js"></script>

    <!--  -->
    <script>   

    window.alert_toast = function($msg = 'TEST', $bg = 'success', $pos = 'top-end') {
        console.log('Mensaje:', $msg);
        console.log('Fondo:', $bg);
        console.log('Posición:', $pos);
        var Toast = Swal.mixin({
            toast: true,
            position: $pos,
            showConfirmButton: false,
            timer: 5000
        });
        Toast.fire({
            icon: $bg,
            title: $msg
        })
    }

    function validateImage(file, baseUrl, baseApp){
        if(file && file !== ''){
            const url = baseUrl + file;

            const img = new Image();
            img.src = url;

            return new Promise((resolve) => {
                img.onload = () => resolve(url);
                img.onerror = () => resolve(baseUrl + 'assets/img/no-image-available.png');
            });
        } else {
            return Promise.resolve(baseUrl + 'assets/img/no-image-available.png');
        }
    }

        var _base_url_ = '<?php echo base_url ?>';
        var _base_app_ = '<?php echo base_ap ?>';
    </script>
    <!-- complemento para el login.php -->
    <script src="<?php echo base_url ?>assets/js/login.js"></script>
    <!-- complemento para el index.php de System -->
    <script src="<?php echo base_url ?>assets/js/system.js"></script>
</head>
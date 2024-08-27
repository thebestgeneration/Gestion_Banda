<?php
require_once('authorize_session.php');
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BANDA</title>

    <!-- Complemento Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url ?>plugins/fontawesome-free/css/all.min.css">

    <!-- Complemento AdminLTE -->
    <link rel="stylesheet" href="<?php echo base_url ?>assets/css/adminlte.css">

    <!-- Complemento Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Complemento Tailwind CSS -->
    <!--<script src="https://cdn.tailwindcss.com"></script>-->

    <!-- Complemento JQuery -->
    <script src="<?php echo base_url ?>plugins/jquery/jquery.min.js"></script>

    <!-- Script de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Script para definir base URL globalmente -->
    <script>
        var _base_url_ = '<?php echo base_url ?>';
    </script>

    <!-- Script de Login personalizado -->
    <script src="<?php echo base_url ?>assets/js/login.js"></script>
</head>

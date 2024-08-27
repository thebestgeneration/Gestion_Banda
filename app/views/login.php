<?php
  require_once('../../config/config.php')
?>
<!DOCTYPE html>
<html lang = "en" class = "" style = "height: auto;">
  <?php require_once(base_app . '../app/includes/header.php') ?>
  <head>
    <link rel="stylesheet" href="<?php echo base_url ?>assets/css/login.css">
  </head>
    <body>
      <script>
        start_loader()
      </script>

        <!----------------------- Main Container -------------------------->

        <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!----------------------- Login Container -------------------------->

        <div class="row border rounded-5 p-3 bg-white shadow box-area" style="width: 90%; max-width: 1200px;"> <!-- Ajusta el ancho con width y max-width -->

        <!--------------------------- Left Box ----------------------------->

            <div class="col-md-5 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
                <div class="featured-image mb-3">
                    <img src="../../assets/images/imglogin.jpg" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Ingresa</p>
                <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Accede a tu plataforma de gestión.</small>
            </div> 

        <!-------------------- ------ Right Box ---------------------------->

            <div class="col-md-7 right-box"> <!-- Aumentar el tamaño de la columna derecha -->
                <div class="row align-items-center">
                    <form id="login-frm" class="space-y-6" action="" method="POST">
                        <div class="header-text mb-4">
                            <h3>¡Hola!</h3>
                            <p>Estamos felices de tenerte de vuelta.</p>
                        </div>
                        <div>
                            <label for="code" class="block text-sm font-medium leading-6 text-gray-900">Código de Socio</label>
                            <div class="input-group mb-3">
                                <input name="username" type="text" class="form-control form-control-lg bg-light fs-6" autofocus placeholder="N° de socio">
                            </div>
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Contraseña</label>
                            <div class="input-group mb-1">
                                <input name="password" type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Contraseña">
                            </div>
                        </div>

                        <div class="input-group mb-5 d-flex justify-content-between">
                            <div class="forgot">
                                <small><a href="#">¿Olvidaste tu contraseña?</a></small>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Ingresar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        </div>

          <script>
            $(document).ready(function(){
              end_loader();
            })
          </script>

    </body>
    
</html>
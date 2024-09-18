<?php if(Settings::chk_flashdata('success')): ?>
	<script>
		window.addEventListener('load', function(){
			var message = "<?php echo Settings::flashdata('success') ?>";
            console.log('Mensaje Flash:', message);
			alert_toast(message, 'success');
		});
	</script>
<?php endif; ?>

<div class="col-lg-12 mt-3">
	<div class="card">
		<div class="card-header">
			<h5 class="card-title">Configuración Global del Sistema</h5>
		</div>
		<div class="card-body">
			<form id="system-frm">
				<div id="msg" class="mb-3"></div>
				<div class="mb-3">
					<label for="name" class="form-label system">Nombre del Sistema</label>
					<input type="text" class="form-control form-control-sm" name="name" id="name">
				</div>
				<div class="mb-3">
					<label for="short_name" class="form-label system">Nombre Corto del Sistema</label>
					<input type="text" class="form-control form-control-sm" name="short_name" id="short_name">
				</div>
				<div class="mb-3">
					<label for="customFile" class="form-label system">Logo del Sistema</label>
					<input type="file" class="form-control" id="logo" name="img" onchange="displayImg(this, 'cimg')">
				</div>
				<div class="mb-3 d-flex justify-content-center">
					<img alt="" id="cimg" class="img-fluid img-thumbnail">
				</div>
				<div class="mb-3">
					<label for="customFile2" class="form-label system">Imagen de Fondo Login</label>
					<input type="file" class="form-control" id="cover" name="cover" onchange="displayImg(this, 'cimg2')">
				</div>
				<div class="mb-3 d-flex justify-content-center">
					<img alt="" id="cimg2" class="img-fluid img-thumbnail">
				</div>
			</form>
		</div>
		<div class="card-footer">
			<div class="d-flex justify-content-end">
				<button class="btn btn-sm btn-primary" id="btnSystem">Guardar</button>
			</div>
		</div>
	</div>
</div>
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
					<input type="text" class="form-control form-control-sm" name="name" id="name" value="">
				</div>
				<div class="mb-3">
					<label for="short_name" class="form-label system">Nombre Corto del Sistema</label>
					<input type="text" class="form-control form-control-sm" name="short_name" id="short_name" value="">
				</div>
				<div class="mb-3">
					<label for="customFile" class="form-label system">Logo del Sistema</label>
					<input type="file" class="form-control" id="logo" name="img" onchange="displayImg(this,$(this))">
				</div>
				<div class="mb-3 d-flex justify-content-center">
					<img src="<?php echo validate_image('logo.jpg') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
				</div>
				<div class="mb-3">
					<label for="customFile2" class="form-label system">Imagen de Fondo Login</label>
					<input type="file" class="form-control" id="cover" name="cover" onchange="displayImg2(this,$(this))">
				</div>
				<div class="mb-3 d-flex justify-content-center">
					<img src="<?php echo validate_image('logo.jpg') ?>" alt="" id="cimg2" class="img-fluid img-thumbnail">
				</div>
			</form>
		</div>
		<div class="card-footer">
			<div class="d-flex justify-content-end">
				<button class="btn btn-sm btn-primary" form="system-frm">Actualizar</button>
			</div>
		</div>
	</div>
</div>
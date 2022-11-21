@extends('layouts.base')
@section('content')
    <div class="content-body">


		<section class="bs-validation">
			<div class="row">
				<!-- Bootstrap Validation -->
				<div class="col-md-6 col-md-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Registro de Usuario</h4>
						</div>
						<div class="card-body">
							
							<form id="formRegistro">@csrf
								<div class="form-group">
									<label class="form-label" for="">NombreUsuario</label>
									<input type="text" id="name" class="form-control" name="name" placeholder="Name" aria-label="Name" aria-describedby="basic-addon-name" required />
									<p id="estadousuario" style="color: red"></p> 
								</div>
								<div class="form-group">
									<label class="form-label" for="">Correo</label>
									<input type="email" id="email" name="email" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe@email.com" required />
									<p id="estadoemail" style="color: red"></p>
								</div>
								<div class="form-group">
									<label class="form-label" for="">Contraseña</label>
									<input type="password" id="password" name="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
								</div>
								<div class="row">
									<div class="col-12">
										<button type="submit" class="btn btn-primary btnRegistrar">Registrar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /Bootstrap Validation -->
			</div>
		</section>

	</div>
</div>
@endsection


<script>
	

</script>

@extends('template.layout')
@section('titleGeneral', '')
@section('sectionGeneral')
<form id="frmCityInsert" action="{{url('city/insert')}}" method="post">
	<div class="row">
		<div class="col-md-12 form-group text-center">
			<h3>CAMBIAR CONTRASEÑA</h3>
		</div>
		<div class="col-md-4 form-group">
			<label for="txtContraseñaActual">Contraseña actual:</label>
			<input type="password" id="txtContraseñaActual" name="txtContraseñaActual" class="form-control">
		</div>
		<div class="col-md-4 form-group">
			<label for="txtNuevaContraseña">Nueva contraseña:</label>
			<input type="password" id="txtNuevaContraseña" name="txtNuevaContraseña" class="form-control">
		</div>
		<div class="col-md-4 form-group">
			<label for="txtRepitaContraseña">Repita contraseña:</label>
			<input type="password" id="txtRepitaContraseña" name="txtRepitaContraseña" class="form-control">
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12 text-center">
			<button type="button" class="btn btn-dark" onclick="sendFrmCityInsert();">Confirmar</button>
		</div>
	</div>
</form>
@endsection
@extends('template.layout')
@section('titleGeneral', '')
@section('sectionGeneral')
<div class="d-flex justify-content-end">
        <a href="#" class="nav-link">
            <i class="fas fa-cog"></i>
        </a>
    </div>
    
    <form id="frmCityInsert" action="{{url('ticket/insert')}}" method="post">
	<div class="row">
        
		<div class="col-md-12 form-group text-center">
			<label for="">PROBLEMA</label>
		</div>
		<div class="col-md-12 form-group">
			<label for="">Nombre de la queja</label>
			<input type="text" id="txtName" name="txtName" class="form-control">
		</div>
        <div class="col-md-12 form-group">
			<label for="">Descripción</label>
			<input type="text" id="txtDescripcion" name="txtDescripcion" class="form-control">
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12 text-center">
			<button type="button" class="btn btn-primary" onclick="sendFrmCityInsert();">Enviar</button>
		</div>
	</div>
</form>
@endsection
@section('js')
<script src="{{asset('viewresources/city/insert.js')}}"></script>
@endsection

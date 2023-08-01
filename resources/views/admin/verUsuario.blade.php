@extends('template.admin')
@section('titleGeneral', 'Lista de usuarios')
@section('sectionGeneral')
<table class="table table-striped">


	<div class="block-options pull-right">
        <a href="#" class="btn btn-alt btn-sm btn-primary" 
            data-toggle="modal" data-target="#modal-InsertUsuario" 
            title="Nuevo Registro Usuario">
        <i  class="fa fa-plus"></i> Nuevo
        </a>
	</div>		
	<div id="modal-InsertUsuario" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-center text-danger">Inserta Nuevo Usuario<h2>
                </div>
                <div class="modal-body">
                    <form id="form_Inser_user" class="form-horizontal form-bordered">
                        <div class="form-group">  
							<div class="row">                                                                                       
								<div class="col-md-6 text-center">
									<input type="text" name="nom" class="form-control" placeholder="Nombres">
									<small class="control-label label-sm">Nombres</small>
								</div>
								<div class="col-md-6 text-center">
									<input type="text" name="app" class="form-control" placeholder="Apellidos">
									<small class="control-label label-sm">Apellidos</small>
								</div>
							</div>

								<div class="col-md-4 text-center">
									<label class="radio-inline">
										<input class="form-check-input" type="radio" name="sexo"  value="M">
										Masculino
									</label>   
									<label class="radio-inline">
										<input class="form-check-input" type="radio" name="sexo"  value="F">
										Femenino
									</label> 
									<br><small class="control-label label-sm">Genero</small>
								</div>
							
                            <div class="col-md-4 text-center">
                                <input type="text" name="cel" class="form-control" placeholder="9189057410">
                                <small class="control-label label-sm">Nro. de Celular</small>
                            </div>
                            <div class="col-md-8 text-center">
                                <input type="email" name="mail" class="form-control" placeholder="henry@gmail.com">
                                <small class="control-label label-sm">Correo</small>
                            </div>
                                                
                            <div class="col-md-4 text-center">
                                <select name="tuser" class="form-control">
                                    <option value="">Seleccione</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Normal</option>
                                </select>
                                <small class="control-label label-sm">Tipo de Usuario</small>
                            </div>
                        </div>
                        <div class="col-md-12" id="div_insert_user"></div>
                        <div class="form-group form-actions">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>                                
            </div>
    	</div>
    </div>
	<thead>
		<tr>
			<th>Nombre </th>
			<th>Apellido</th>
			<th>Genero</th>
			<th>Celular</th>
			<th>Rol</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	
	</tbody>
</table>
@endsection
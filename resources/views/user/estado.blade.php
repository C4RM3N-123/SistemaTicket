@extends('template.layout')

@section('sectionGeneral')
<div class="row">
        <div class="col-md-12 form-group text-center">
            <h3>ESTADO DEL TICKET</h3>
        </div>
    </div>
<div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
              			<th>Nombre del problema</th>
						<th>Descripción</th>
						<th>Tipo</th>
						<th>Estado</th>
						
                    </tr>
                </thead>
                <tbody>
         			@foreach($listEst as $value)
						<tr>
							<td>{{$value->name}}</td>
							<td>{{$value->description}}</td>
							
							<td>{{$value->type}}</td>
							<td>{{$value->prioritie}}</td>
							
						</tr>
					@endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection